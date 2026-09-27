@php
    $modules = [
        ['label' => 'Public Alerts', 'href' => '#', 'color' => 'bg-blue-400', 'active' => true],
        ['label' => 'Dispatch', 'href' => '#', 'color' => 'bg-emerald-400'],
        ['label' => 'Monitoring', 'href' => '#', 'color' => 'bg-violet-400'],
        ['label' => 'Priority Map', 'href' => '#', 'color' => 'bg-amber-400'],
    ];
@endphp

@extends('layouts.dashboard-shell', [
    'brand' => 'Officer',
    'roleLabel' => 'Service Officer',
    'dashboardRoute' => 'officer.dashboard',
    'pageTitle' => 'Dashboard Petugas',
    'modules' => $modules,
])
