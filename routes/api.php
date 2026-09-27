<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CompetencyController;
use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\AiController;
use App\Http\Controllers\Api\RecommendationController;
use App\Http\Controllers\Api\LearningPathController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SIGAP API Routes
|--------------------------------------------------------------------------
*/

// ── Public routes (no auth required) ─────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// ── Protected routes (require Sanctum token) ─────────────────────────────
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Competencies
    Route::get('/competencies', [CompetencyController::class, 'index']);

    // Assessment (adaptive)
    Route::get('/assessment/{competencyId}/start',   [AssessmentController::class, 'start']);
    Route::post('/assessment/{sessionId}/answer',    [AssessmentController::class, 'answer']);
    Route::get('/assessment/{sessionId}/result',     [AssessmentController::class, 'result']);

    // AI Services
    Route::post('/ai/insight', [AiController::class, 'generateInsight']);
    Route::post('/ai/chat',    [AiController::class, 'chat']);

    // Recommendations
    Route::get('/recommendations', [RecommendationController::class, 'index']);

    // Learning Path
    Route::get('/learning-path/{competencyId}', [LearningPathController::class, 'show']);
});
