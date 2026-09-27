<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function learningProgress()
    {
        return $this->hasMany(LearningProgress::class);
    }

    public function assessmentSessions()
    {
        return $this->hasMany(AssessmentSession::class);
    }

    public function aiInsights()
    {
        return $this->hasMany(AiInsight::class);
    }

    public function aiConversations()
    {
        return $this->hasMany(AiConversation::class);
    }

    // Helpers
    public function isLearner(): bool
    {
        return $this->role === 'learner';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function isMentor(): bool
    {
        return $this->role === 'mentor';
    }

    public function isOfficer(): bool
    {
        return $this->role === 'officer';
    }

    public function isInstitution(): bool
    {
        return $this->role === 'institution';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function getAverageMasteryLevel(): int
    {
        $avg = $this->learningProgress()->avg('mastery_level');
        return (int) ($avg ?? 0);
    }
}
