@php
    $modules = [
        ['label' => 'System Health', 'href' => '#', 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Users', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'Access Policy', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'Security', 'href' => '#', 'color' => 'bg-amber-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'Admin',
    'roleLabel' => 'System Admin',
    'dashboardRoute' => 'admin.dashboard',
    'pageTitle' => 'System Dashboard',
    'modules' => $modules,
])
