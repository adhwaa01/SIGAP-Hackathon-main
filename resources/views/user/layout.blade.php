@php
    $modules = [
        ['label' => 'Beranda', 'href' => '#', 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Intelligence', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'Rekomendasi', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'Aktivitas', 'href' => '#', 'color' => 'bg-amber-400'],
        ['label' => 'Education', 'href' => '#', 'color' => 'bg-cyan-400'],
        ['label' => 'Smart City', 'href' => '#', 'color' => 'bg-orange-400'],
        ['label' => 'AI Assistant', 'href' => '#', 'color' => 'bg-indigo-400'],
        ['label' => 'Profil', 'href' => '#', 'color' => 'bg-slate-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'User',
    'roleLabel' => 'Citizen / Learner',
    'dashboardRoute' => 'user.dashboard',
    'pageTitle' => 'Dashboard User',
    'modules' => $modules,
])
