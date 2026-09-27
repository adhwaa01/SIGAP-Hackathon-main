@php
    $modules = [
        ['label' => 'Governance', 'href' => '#', 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Programs', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'KPI', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'Audit', 'href' => '#', 'color' => 'bg-amber-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'Institution',
    'roleLabel' => 'Institution Admin',
    'dashboardRoute' => 'institution.dashboard',
    'pageTitle' => 'Dashboard Institusi',
    'modules' => $modules,
])
