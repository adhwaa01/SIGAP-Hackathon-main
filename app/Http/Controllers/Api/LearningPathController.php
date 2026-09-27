<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Competency;
use App\Models\LearningProgress;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    public function show(Request $request, int $competencyId)
    {
        $user       = $request->user();
        $competency = Competency::findOrFail($competencyId);

        $progress = LearningProgress::where('user_id', $user->id)
            ->where('competency_id', $competencyId)
            ->first();

        $mastery = $progress ? $progress->mastery_level : 0;

        // Define learning path stages
        $stages = [
            [
                'id'          => 1,
                'title'       => 'Fondasi Dasar',
                'description' => "Pelajari konsep-konsep mendasar {$competency->name}",
                'type'        => 'theory',
                'required_mastery' => 0,  // always unlocked
                'unlocked'    => true,
                'completed'   => $mastery >= 30,
                'mastery_target' => 30,
            ],
            [
                'id'          => 2,
                'title'       => 'Latihan Awal',
                'description' => "Uji pemahaman dasar dengan soal-soal level 1-2",
                'type'        => 'assessment',
                'required_mastery' => 30,
                'unlocked'    => $mastery >= 30,
                'completed'   => $mastery >= 50,
                'mastery_target' => 50,
            ],
            [
                'id'          => 3,
                'title'       => 'Materi Menengah',
                'description' => "Pelajari konsep lanjutan dan pattern yang sering digunakan",
                'type'        => 'theory',
                'required_mastery' => 50,
                'unlocked'    => $mastery >= 50,
                'completed'   => $mastery >= 70,
                'mastery_target' => 70,
            ],
            [
                'id'          => 4,
                'title'       => 'Latihan Intensif',
                'description' => "Asah kemampuan dengan soal-soal level 3-4",
                'type'        => 'assessment',
                'required_mastery' => 70,
                'unlocked'    => $mastery >= 70,
                'completed'   => $mastery >= 85,
                'mastery_target' => 85,
            ],
            [
                'id'          => 5,
                'title'       => 'Tantangan Expert',
                'description' => "Buktikan kemampuanmu dengan soal-soal level 5",
                'type'        => 'assessment',
                'required_mastery' => 85,
                'unlocked'    => $mastery >= 85,
                'completed'   => $mastery >= 95,
                'mastery_target' => 95,
            ],
        ];

        // Determine current active stage
        $currentStage = collect($stages)->where('unlocked', true)->where('completed', false)->first();

        return response()->json([
            'competency_id'   => $competency->id,
            'competency_name' => $competency->name,
            'current_mastery' => $mastery,
            'current_stage'   => $currentStage ? $currentStage['id'] : 5,
            'stages'          => $stages,
        ]);
    }
}
