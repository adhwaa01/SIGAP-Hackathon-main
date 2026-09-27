<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LearningProgress;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Get all competency progress sorted weakest first
        $weakCompetencies = LearningProgress::where('user_id', $user->id)
            ->with('competency:id,name,category,description')
            ->orderBy('mastery_level', 'asc')
            ->take(3)
            ->get();

        $recommendations = $weakCompetencies->map(function ($progress) {
            $mastery = $progress->mastery_level;
            $competency = $progress->competency;

            // Determine recommended action and estimated time based on mastery level
            if ($mastery < 30) {
                $action = 'start_assessment';
                $reason = "Kompetensi ini perlu perhatian khusus. Mulai dari dasar untuk membangun fondasi yang kuat.";
                $estimatedTime = '30-45 menit';
            } elseif ($mastery < 60) {
                $action = 'practice_assessment';
                $reason = "Kamu sudah memahami dasar-dasarnya. Saatnya berlatih lebih banyak soal untuk meningkatkan skor.";
                $estimatedTime = '20-30 menit';
            } else {
                $action = 'advanced_assessment';
                $reason = "Bagus! Coba tantang dirimu dengan soal-soal tingkat lanjut untuk mencapai level expert.";
                $estimatedTime = '15-20 menit';
            }

            return [
                'competency_id'   => $competency->id,
                'title'           => "Tingkatkan: {$competency->name}",
                'competency_name' => $competency->name,
                'category'        => $competency->category,
                'mastery_level'   => $mastery,
                'reason'          => $reason,
                'estimated_time'  => $estimatedTime,
                'action'          => $action,
            ];
        });

        return response()->json([
            'recommendations' => $recommendations,
        ]);
    }
}
