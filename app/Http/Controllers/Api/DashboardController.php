<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AiInsight;
use App\Models\LearningProgress;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Rata-rata mastery level semua kompetensi user
        $masteryAvg = $user->getAverageMasteryLevel();

        // Insight yang belum dibaca
        $unreadInsights = AiInsight::where('user_id', $user->id)
            ->where('is_read', false)
            ->latest()
            ->take(3)
            ->get(['id', 'insight_text', 'type', 'created_at']);

        // Competency paling lemah
        $weakest = LearningProgress::where('user_id', $user->id)
            ->with('competency:id,name')
            ->orderBy('mastery_level', 'asc')
            ->first();

        // Progress weekly: count assessment sessions this week
        $weeklyAssessments = $user->assessmentSessions()
            ->where('status', 'completed')
            ->whereBetween('completed_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        return response()->json([
            'intelligence_score' => $masteryAvg,
            'unread_insights'    => $unreadInsights->count(),
            'latest_insights'    => $unreadInsights,
            'weakest_competency' => $weakest ? [
                'name'          => $weakest->competency->name,
                'mastery_level' => $weakest->mastery_level,
            ] : null,
            'weekly_assessments' => $weeklyAssessments,
        ]);
    }
}
