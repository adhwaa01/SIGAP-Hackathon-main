<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{
    protected $fillable = [
        'user_id',
        'competency_id',
        'mastery_level',
        'assessment_count',
        'last_assessed_at',
    ];

    protected $casts = [
        'last_assessed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function getMasteryStatusAttribute(): string
    {
        if ($this->mastery_level >= 80) return 'excellent';
        if ($this->mastery_level >= 60) return 'good';
        if ($this->mastery_level >= 40) return 'developing';
        return 'weak';
    }
}
