@extends('user.layout')

@section('title', 'Competency Map')

@section('content')
@php
    $competencies = [
        ['name' => 'Pemrograman', 'value' => 82, 'color' => 'bg-blue-500'],
        ['name' => 'Database', 'value' => 91, 'color' => 'bg-emerald-500'],
        ['name' => 'Algoritma', 'value' => 62, 'color' => 'bg-amber-500'],
        ['name' => 'Jaringan', 'value' => 73, 'color' => 'bg-violet-500'],
    ];
@endphp

<div class="space-y-6">
    <div class="rounded-3xl border border-cyan-200 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-700">Smart Education</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Competency Map</h1>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        @foreach($competencies as $item)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="mb-3 flex items-center justify-between">
                    <p class="text-lg font-bold text-slate-900">{{ $item['name'] }}</p>
                    <span class="text-sm font-semibold text-slate-700">{{ $item['value'] }}%</span>
                </div>
                <div class="h-2.5 rounded-full bg-slate-200">
                    <div class="h-2.5 rounded-full {{ $item['color'] }}" style="width: {{ $item['value'] }}%"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
