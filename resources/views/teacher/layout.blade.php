@php
    $modules = [
        ['label' => 'Class Overview', 'href' => route('teacher.dashboard'), 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Student Progress', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'Assessment', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'AI Insights', 'href' => '#', 'color' => 'bg-amber-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'Edu',
    'roleLabel' => 'Teacher',
    'dashboardRoute' => 'teacher.dashboard',
    'pageTitle' => 'Teacher Dashboard',
    'modules' => $modules,
])
