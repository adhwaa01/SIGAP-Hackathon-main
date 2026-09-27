<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentSession extends Model
{
    protected $fillable = [
        'user_id',
        'competency_id',
        'current_difficulty',
        'score',
        'mastery_before',
        'mastery_after',
        'status',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'started_at'    => 'datetime',
        'completed_at'  => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function answers()
    {
        return $this->hasMany(AssessmentAnswer::class, 'session_id');
    }

    public function getAnsweredQuestionIds(): array
    {
        return $this->answers()->pluck('question_id')->toArray();
    }
}
