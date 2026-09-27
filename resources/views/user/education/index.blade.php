@extends('user.layout')

@section('title', 'Smart Education')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-cyan-200 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-700">Smart Education</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Jalur belajar Anda</h1>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        @foreach($stats as $stat)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                <p class="mt-3 text-3xl font-black text-slate-900">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="space-y-4">
        @foreach($courses as $course)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cyan-600">{{ $course['level'] }}</p>
                        <h2 class="mt-2 text-2xl font-bold text-slate-900">{{ $course['title'] }}</h2>
                    </div>
                    <a href="{{ route('user.education.detail') }}" class="rounded-xl bg-cyan-600 px-4 py-2 text-sm font-semibold text-white">Lanjutkan</a>
                </div>

                <div class="mt-4">
                    <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                        <span>Progress</span>
                        <span class="font-semibold text-slate-800">{{ $course['progress'] }}%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-200">
                        <div class="h-2.5 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500" style="width: {{ $course['progress'] }}%"></div>
                    </div>
                </div>

                <p class="mt-4 text-sm text-slate-600">Langkah selanjutnya: <span class="font-semibold text-slate-800">{{ $course['next'] }}</span></p>
            </div>
        @endforeach
    </div>
</div>
@endsection
