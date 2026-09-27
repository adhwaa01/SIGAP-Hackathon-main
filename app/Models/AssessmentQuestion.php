<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    protected $fillable = [
        'competency_id',
        'question_text',
        'options',
        'correct_answer',
        'difficulty_level',
        'explanation',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function answers()
    {
        return $this->hasMany(AssessmentAnswer::class, 'question_id');
    }
}
