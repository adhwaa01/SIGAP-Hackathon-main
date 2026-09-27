<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AiConversation;
use App\Models\AiInsight;
use App\Models\AssessmentSession;
use App\Models\LearningProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiController extends Controller
{
    /**
     * Generate AI insight after assessment
     */
    public function generateInsight(Request $request)
    {
        $request->validate([
            'session_id' => 'sometimes|integer|exists:assessment_sessions,id',
        ]);

        $user     = $request->user();
        $progress = LearningProgress::where('user_id', $user->id)
            ->with('competency:id,name')
            ->get();

        if ($progress->isEmpty()) {
            return response()->json(['message' => 'Belum ada data progress untuk dianalisis.'], 422);
        }

        // Build context for AI
        $progressSummary = $progress->map(fn($p) => "{$p->competency->name}: {$p->mastery_level}%")->join(', ');
        $weakest = $progress->sortBy('mastery_level')->first();

        $prompt = <<<PROMPT
Kamu adalah AI Tutor sistem pendidikan SIGAP. Berikan insight singkat (2-3 kalimat) dalam Bahasa Indonesia yang suportif dan actionable berdasarkan data berikut:

Data kompetensi siswa "{$user->name}":
{$progressSummary}

Kompetensi terlemah: {$weakest->competency->name} ({$weakest->mastery_level}%)

Berikan insight yang:
1. Mengakui kekuatan yang ada
2. Menunjukkan area yang perlu diperbaiki
3. Memberikan saran konkret langkah selanjutnya
4. Nada: suportif, motivatif, tidak menghakimi

Jawab hanya dengan teks insight, tanpa label atau bullet point.
PROMPT;

        $insightText = $this->callAI($prompt);

        if (!$insightText) {
            // Fallback message kalau AI gagal
            $insightText = "Kamu sudah berusaha dengan baik! Kompetensi {$weakest->competency->name} ({$weakest->mastery_level}%) masih bisa ditingkatkan. Coba latih lagi dengan mengerjakan lebih banyak soal pada tingkat yang sesuai.";
        }

        $insight = AiInsight::create([
            'user_id'       => $user->id,
            'competency_id' => $weakest->competency_id,
            'insight_text'  => $insightText,
            'type'          => 'recommendation',
            'is_read'       => false,
        ]);

        return response()->json([
            'insight' => [
                'id'           => $insight->id,
                'insight_text' => $insight->insight_text,
                'type'         => $insight->type,
                'created_at'   => $insight->created_at,
            ],
        ]);
    }

    /**
     * AI Tutor chat endpoint
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message'    => 'required|string|max:2000',
            'session_id' => 'sometimes|string|max:100',
        ]);

        $user      = $request->user();
        $message   = $request->message;
        $sessionId = $request->session_id ?? uniqid('chat_', true);

        // Build user's competency profile for context
        $progress = LearningProgress::where('user_id', $user->id)
            ->with('competency:id,name')
            ->get();

        $profileContext = $progress->isNotEmpty()
            ? $progress->map(fn($p) => "- {$p->competency->name}: {$p->mastery_level}% ({$p->mastery_status})")->join("\n")
            : "- Belum ada data progress (pengguna baru)";

        // Get recent conversation history
        $history = AiConversation::where('user_id', $user->id)
            ->where('session_id', $sessionId)
            ->latest()
            ->take(6) // last 3 exchanges
            ->get()
            ->reverse();

        $systemPrompt = <<<SYSTEM
Kamu adalah SIGAP AI Tutor, asisten belajar cerdas yang membantu siswa memahami materi pemrograman.

Profil kompetensi siswa "{$user->name}":
{$profileContext}

Instruksi:
- Jawab dalam Bahasa Indonesia yang jelas dan ramah
- Sesuaikan kompleksitas jawaban dengan level kompetensi siswa
- Untuk topik yang masih lemah (< 60%), berikan penjelasan lebih mendasar dengan contoh sederhana
- Untuk topik yang sudah kuat (>= 80%), bisa gunakan konsep lebih lanjut
- Sertakan contoh kode jika relevan
- Maksimal 300 kata per respons
SYSTEM;

        // Build messages for API
        $messages = [];
        foreach ($history as $conv) {
            $messages[] = ['role' => $conv->role, 'content' => $conv->message];
        }
        $messages[] = ['role' => 'user', 'content' => $message];

        $responseText = $this->callAIChat($systemPrompt, $messages);

        if (!$responseText) {
            $responseText = "Maaf, saya sedang mengalami gangguan teknis. Silakan coba lagi dalam beberapa saat.";
        }

        // Save conversation history
        AiConversation::create([
            'user_id'    => $user->id,
            'session_id' => $sessionId,
            'role'       => 'user',
            'message'    => $message,
        ]);
        AiConversation::create([
            'user_id'    => $user->id,
            'session_id' => $sessionId,
            'role'       => 'assistant',
            'message'    => $responseText,
        ]);

        return response()->json([
            'session_id' => $sessionId,
            'response'   => $responseText,
        ]);
    }

    // ── Private helpers ──────────────────────────────────────────────────

    private function callAI(string $prompt): ?string
    {
        $provider = config('services.ai.provider', 'openai');

        try {
            if ($provider === 'claude') {
                return $this->callClaude($prompt);
            }
            return $this->callOpenAI($prompt);
        } catch (\Exception $e) {
            Log::error('AI API error: ' . $e->getMessage());
            return null;
        }
    }

    private function callAIChat(string $systemPrompt, array $messages): ?string
    {
        $provider = config('services.ai.provider', 'openai');

        try {
            if ($provider === 'claude') {
                return $this->callClaudeChat($systemPrompt, $messages);
            }
            return $this->callOpenAIChat($systemPrompt, $messages);
        } catch (\Exception $e) {
            Log::error('AI Chat API error: ' . $e->getMessage());
            return null;
        }
    }

    private function callOpenAI(string $prompt): ?string
    {
        $apiKey = config('services.openai.key');
        if (!$apiKey) return null;

        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model'    => 'gpt-4o-mini',
                'messages' => [['role' => 'user', 'content' => $prompt]],
                'max_tokens' => 300,
                'temperature' => 0.7,
            ]);

        return $response->json('choices.0.message.content');
    }

    private function callOpenAIChat(string $systemPrompt, array $messages): ?string
    {
        $apiKey = config('services.openai.key');
        if (!$apiKey) return null;

        $allMessages = array_merge(
            [['role' => 'system', 'content' => $systemPrompt]],
            $messages
        );

        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model'       => 'gpt-4o-mini',
                'messages'    => $allMessages,
                'max_tokens'  => 500,
                'temperature' => 0.7,
            ]);

        return $response->json('choices.0.message.content');
    }

    private function callClaude(string $prompt): ?string
    {
        $apiKey = config('services.claude.key');
        if (!$apiKey) return null;

        $response = Http::withHeaders([
            'x-api-key'         => $apiKey,
            'anthropic-version' => '2023-06-01',
        ])
        ->timeout(30)
        ->post('https://api.anthropic.com/v1/messages', [
            'model'      => 'claude-3-haiku-20240307',
            'max_tokens' => 300,
            'messages'   => [['role' => 'user', 'content' => $prompt]],
        ]);

        return $response->json('content.0.text');
    }

    private function callClaudeChat(string $systemPrompt, array $messages): ?string
    {
        $apiKey = config('services.claude.key');
        if (!$apiKey) return null;

        $response = Http::withHeaders([
            'x-api-key'         => $apiKey,
            'anthropic-version' => '2023-06-01',
        ])
        ->timeout(30)
        ->post('https://api.anthropic.com/v1/messages', [
            'model'      => 'claude-3-haiku-20240307',
            'max_tokens' => 500,
            'system'     => $systemPrompt,
            'messages'   => $messages,
        ]);

        return $response->json('content.0.text');
    }
}
