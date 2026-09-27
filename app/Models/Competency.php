<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $fillable = ['name', 'category', 'description', 'order'];

    public function questions()
    {
        return $this->hasMany(AssessmentQuestion::class);
    }

    public function learningProgress()
    {
        return $this->hasMany(LearningProgress::class);
    }

    public function assessmentSessions()
    {
        return $this->hasMany(AssessmentSession::class);
    }
}
