<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentAnswer extends Model
{
    protected $fillable = [
        'session_id',
        'question_id',
        'selected_answer',
        'is_correct',
        'difficulty_at_answer',
        'answered_at',
    ];

    protected $casts = [
        'is_correct'   => 'boolean',
        'answered_at'  => 'datetime',
    ];

    public function session()
    {
        return $this->belongsTo(AssessmentSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'question_id');
    }
}
