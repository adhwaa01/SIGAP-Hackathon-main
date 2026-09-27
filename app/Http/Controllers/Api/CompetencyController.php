<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Competency;
use App\Models\LearningProgress;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $competencies = Competency::orderBy('order')->get();

        $data = $competencies->map(function ($competency) use ($user) {
            $progress = LearningProgress::where('user_id', $user->id)
                ->where('competency_id', $competency->id)
                ->first();

            return [
                'id'               => $competency->id,
                'name'             => $competency->name,
                'category'         => $competency->category,
                'description'      => $competency->description,
                'mastery_level'    => $progress ? $progress->mastery_level : 0,
                'mastery_status'   => $progress ? $progress->mastery_status : 'weak',
                'assessment_count' => $progress ? $progress->assessment_count : 0,
                'last_assessed_at' => $progress ? $progress->last_assessed_at : null,
            ];
        });

        // Sort by mastery_level ascending (weakest first)
        $sorted = $data->sortBy('mastery_level')->values();

        return response()->json([
            'competencies' => $sorted,
        ]);
    }
}
