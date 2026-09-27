@php
    $modules = [
        ['label' => 'Mentoring', 'href' => '#', 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Learner Pulse', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'Coaching Notes', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'Intervention', 'href' => '#', 'color' => 'bg-amber-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'Mentor',
    'roleLabel' => 'Mentor',
    'dashboardRoute' => 'mentor.dashboard',
    'pageTitle' => 'Dashboard Mentor',
    'modules' => $modules,
])
