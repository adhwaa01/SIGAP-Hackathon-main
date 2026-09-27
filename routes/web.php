<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Shared SIGAP login routes
Route::get('/login', [TeacherController::class, 'showLoginForm'])->name('login');
Route::post('/login', [TeacherController::class, 'login']);
Route::get('/teacher/login', [TeacherController::class, 'showLoginForm']);
Route::post('/teacher/login', [TeacherController::class, 'login']);
Route::post('/teacher/logout', [TeacherController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/intelligence', [\App\Http\Controllers\UserController::class, 'intelligence'])->name('user.intelligence');
    Route::get('/user/intelligence/detail', [\App\Http\Controllers\UserController::class, 'intelligenceDetail'])->name('user.intelligence.detail');
    Route::get('/user/recommendations', [\App\Http\Controllers\UserController::class, 'recommendations'])->name('user.recommendations');
    Route::get('/user/recommendations/detail', [\App\Http\Controllers\UserController::class, 'recommendationDetail'])->name('user.recommendations.detail');
    Route::get('/user/activities', [\App\Http\Controllers\UserController::class, 'activities'])->name('user.activities');
    Route::get('/user/notifications', [\App\Http\Controllers\UserController::class, 'notifications'])->name('user.notifications');
    Route::get('/user/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/settings', [\App\Http\Controllers\UserController::class, 'settings'])->name('user.settings');
    Route::get('/user/settings/privacy', [\App\Http\Controllers\UserController::class, 'settingsPrivacy'])->name('user.settings.privacy');
    Route::get('/user/settings/security', [\App\Http\Controllers\UserController::class, 'settingsSecurity'])->name('user.settings.security');

    Route::get('/user/education', [\App\Http\Controllers\UserController::class, 'education'])->name('user.education');
    Route::get('/user/education/competency', [\App\Http\Controllers\UserController::class, 'education'])->name('user.education.competency');
    Route::get('/user/education/learning-path', [\App\Http\Controllers\UserController::class, 'educationLearningPath'])->name('user.education.learning-path');
    Route::get('/user/education/assessment', [\App\Http\Controllers\UserController::class, 'educationAssessment'])->name('user.education.assessment');
    Route::get('/user/education/ai-tutor', [\App\Http\Controllers\UserController::class, 'educationAiTutor'])->name('user.education.ai-tutor');
    Route::get('/user/education/detail', [\App\Http\Controllers\UserController::class, 'educationDetail'])->name('user.education.detail');

    Route::get('/user/city', [\App\Http\Controllers\UserController::class, 'city'])->name('user.city');
    Route::get('/user/city/map', [\App\Http\Controllers\UserController::class, 'city'])->name('user.city.map');
    Route::get('/user/city/report', [\App\Http\Controllers\UserController::class, 'cityReport'])->name('user.city.report');
    Route::get('/user/city/report-detail', [\App\Http\Controllers\UserController::class, 'cityReportDetail'])->name('user.city.report.detail');
    Route::get('/user/city/public-service', [\App\Http\Controllers\UserController::class, 'cityPublicService'])->name('user.city.public-service');
    Route::get('/user/city/detail', [\App\Http\Controllers\UserController::class, 'cityDetail'])->name('user.city.detail');

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/mentor/dashboard', [TeacherController::class, 'mentorDashboard'])->name('mentor.dashboard');
    Route::get('/officer/dashboard', [TeacherController::class, 'officerDashboard'])->name('officer.dashboard');
    Route::get('/institution/dashboard', [TeacherController::class, 'institutionDashboard'])->name('institution.dashboard');
    Route::get('/admin/dashboard', [TeacherController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/teacher/student/{id}', [TeacherController::class, 'studentDetail'])->name('teacher.student');
});
