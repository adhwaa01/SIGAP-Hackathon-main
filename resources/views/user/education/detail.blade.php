@extends('user.layout')

@section('title', 'Detail Modul')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-cyan-200 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-700">Modul</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">{{ $course['title'] }}</h1>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center justify-between">
                <p class="text-sm text-slate-500">Progress</p>
                <span class="rounded-full bg-cyan-100 px-2.5 py-1 text-xs font-semibold text-cyan-700">{{ $course['progress'] }}%</span>
            </div>

            <div class="h-2.5 rounded-full bg-slate-200">
                <div class="h-2.5 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500" style="width: {{ $course['progress'] }}%"></div>
            </div>

            <p class="mt-5 text-base leading-7 text-slate-600">{{ $course['summary'] }}</p>

            <div class="mt-6 rounded-xl bg-slate-50 p-4">
                <p class="font-semibold text-slate-900">Tujuan pembelajaran</p>
                <ul class="mt-3 space-y-2 text-sm text-slate-600">
                    @foreach($course['objectives'] as $objective)
                        <li class="flex gap-2"><span class="mt-1 inline-block h-2 w-2 rounded-full bg-cyan-500"></span> {{ $objective }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Aksi</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Mulai materi</h2>

            <div class="mt-5 space-y-3">
                <button class="w-full rounded-xl bg-cyan-600 px-4 py-3 text-sm font-semibold text-white">Lanjutkan lesson</button>
                <button class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">Tonton video</button>
                <button class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">Kerjakan latihan</button>
            </div>
        </div>
    </div>
</div>
@endsection
