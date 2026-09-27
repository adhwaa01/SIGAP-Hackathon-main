<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AssessmentAnswer;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentSession;
use App\Models\Competency;
use App\Models\LearningProgress;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    const TOTAL_QUESTIONS = 10;
    const MIN_DIFFICULTY  = 1;
    const MAX_DIFFICULTY  = 5;

    /**
     * Start a new assessment session for a competency
     */
    public function start(Request $request, int $competencyId)
    {
        $user       = $request->user();
        $competency = Competency::findOrFail($competencyId);

        // Cancel any in-progress session for this competency
        AssessmentSession::where('user_id', $user->id)
            ->where('competency_id', $competencyId)
            ->where('status', 'in_progress')
            ->update(['status' => 'completed']);

        // Get current mastery level (snapshot)
        $progress      = LearningProgress::where('user_id', $user->id)
            ->where('competency_id', $competencyId)
            ->first();
        $masteryBefore = $progress ? $progress->mastery_level : 0;

        // Create new session, starting at difficulty 3 (medium)
        $session = AssessmentSession::create([
            'user_id'           => $user->id,
            'competency_id'     => $competencyId,
            'current_difficulty'=> 3,
            'mastery_before'    => $masteryBefore,
            'status'            => 'in_progress',
        ]);

        // Fetch first question (difficulty 3)
        $question = $this->getNextQuestion($session);

        if (!$question) {
            return response()->json([
                'message' => 'Belum ada soal untuk kompetensi ini.',
            ], 422);
        }

        return response()->json([
            'session_id'       => $session->id,
            'competency'       => $competency->name,
            'question_number'  => 1,
            'total_questions'  => self::TOTAL_QUESTIONS,
            'current_difficulty' => $session->current_difficulty,
            'mastery_before'   => $masteryBefore,
            'question'         => $this->formatQuestion($question),
        ]);
    }

    /**
     * Submit an answer and get the next question
     */
    public function answer(Request $request, int $sessionId)
    {
        $request->validate([
            'question_id'     => 'required|integer|exists:assessment_questions,id',
            'selected_answer' => 'required|string|in:A,B,C,D',
        ]);

        $user    = $request->user();
        $session = AssessmentSession::where('id', $sessionId)
            ->where('user_id', $user->id)
            ->where('status', 'in_progress')
            ->firstOrFail();

        $question  = AssessmentQuestion::findOrFail($request->question_id);
        $isCorrect = strtoupper($request->selected_answer) === strtoupper($question->correct_answer);

        // Save answer
        AssessmentAnswer::create([
            'session_id'         => $session->id,
            'question_id'        => $question->id,
            'selected_answer'    => strtoupper($request->selected_answer),
            'is_correct'         => $isCorrect,
            'difficulty_at_answer' => $session->current_difficulty,
            'answered_at'        => now(),
        ]);

        // Adaptive difficulty adjustment
        $newDifficulty = $session->current_difficulty;
        if ($isCorrect) {
            $newDifficulty = min(self::MAX_DIFFICULTY, $newDifficulty + 1);
        } else {
            $newDifficulty = max(self::MIN_DIFFICULTY, $newDifficulty - 1);
        }

        $answeredCount = $session->answers()->count();

        // Check if assessment is complete
        if ($answeredCount >= self::TOTAL_QUESTIONS) {
            return $this->completeSession($session, $user);
        }

        // Update difficulty and fetch next question
        $session->update(['current_difficulty' => $newDifficulty]);
        $nextQuestion = $this->getNextQuestion($session);

        if (!$nextQuestion) {
            // Fallback: use any difficulty if current difficulty has no more questions
            $nextQuestion = $this->getNextQuestion($session, fallback: true);
        }

        if (!$nextQuestion) {
            return $this->completeSession($session, $user);
        }

        return response()->json([
            'is_correct'         => $isCorrect,
            'correct_answer'     => $question->correct_answer,
            'explanation'        => $question->explanation,
            'question_number'    => $answeredCount + 1,
            'total_questions'    => self::TOTAL_QUESTIONS,
            'current_difficulty' => $newDifficulty,
            'session_complete'   => false,
            'question'           => $this->formatQuestion($nextQuestion),
        ]);
    }

    /**
     * Get session result
     */
    public function result(Request $request, int $sessionId)
    {
        $user    = $request->user();
        $session = AssessmentSession::where('id', $sessionId)
            ->where('user_id', $user->id)
            ->with('competency:id,name')
            ->firstOrFail();

        $answers = $session->answers()->with('question:id,question_text,correct_answer,difficulty_level,explanation')->get();

        return response()->json([
            'session_id'      => $session->id,
            'competency'      => $session->competency->name,
            'score'           => $session->score,
            'mastery_before'  => $session->mastery_before,
            'mastery_after'   => $session->mastery_after,
            'status'          => $session->status,
            'total_questions' => $answers->count(),
            'correct_answers' => $answers->where('is_correct', true)->count(),
            'completed_at'    => $session->completed_at,
        ]);
    }

    // ── Private helpers ──────────────────────────────────────────────────

    private function getNextQuestion(AssessmentSession $session, bool $fallback = false): ?AssessmentQuestion
    {
        $answeredIds = $session->getAnsweredQuestionIds();

        $query = AssessmentQuestion::where('competency_id', $session->competency_id)
            ->whereNotIn('id', $answeredIds ?: [0]);

        if (!$fallback) {
            $query->where('difficulty_level', $session->current_difficulty);
        }

        return $query->inRandomOrder()->first();
    }

    private function formatQuestion(AssessmentQuestion $question): array
    {
        return [
            'id'               => $question->id,
            'question_text'    => $question->question_text,
            'options'          => $question->options,
            'difficulty_level' => $question->difficulty_level,
        ];
    }

    private function completeSession(AssessmentSession $session, $user)
    {
        $answers       = $session->answers;
        $totalAnswered = $answers->count();
        $correctCount  = $answers->where('is_correct', true)->count();

        // Score = percentage correct (0-100)
        $score = $totalAnswered > 0 ? (int) round(($correctCount / $totalAnswered) * 100) : 0;

        // Calculate new mastery level (weighted: 70% old, 30% new score)
        $progress = LearningProgress::firstOrCreate(
            ['user_id' => $session->user_id, 'competency_id' => $session->competency_id],
            ['mastery_level' => 0, 'assessment_count' => 0]
        );

        $oldMastery   = $progress->mastery_level;
        $newMastery   = (int) round(($oldMastery * 0.7) + ($score * 0.3));

        // Update progress
        $progress->update([
            'mastery_level'    => $newMastery,
            'assessment_count' => $progress->assessment_count + 1,
            'last_assessed_at' => now(),
        ]);

        // Complete the session
        $session->update([
            'score'          => $score,
            'mastery_after'  => $newMastery,
            'status'         => 'completed',
            'completed_at'   => now(),
        ]);

        return response()->json([
            'session_complete'  => true,
            'session_id'        => $session->id,
            'score'             => $score,
            'correct_answers'   => $correctCount,
            'total_questions'   => $totalAnswered,
            'mastery_before'    => $session->mastery_before,
            'mastery_after'     => $newMastery,
            'mastery_change'    => $newMastery - $session->mastery_before,
            'message'           => $this->getCompletionMessage($score),
        ]);
    }

    private function getCompletionMessage(int $score): string
    {
        if ($score >= 80) return 'Luar biasa! Kamu menguasai materi ini dengan sangat baik.';
        if ($score >= 60) return 'Bagus! Terus tingkatkan pemahamanmu.';
        if ($score >= 40) return 'Kamu sedang berkembang. Tetap semangat belajar!';
        return 'Jangan menyerah! Ulangi materi dan coba lagi.';
    }
}
