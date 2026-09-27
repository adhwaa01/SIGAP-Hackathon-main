@extends('user.layout')

@section('title', 'Learning Path')

@section('content')
@php
    $path = [
        ['title' => 'Algoritma Dasar', 'status' => 'done'],
        ['title' => 'Percabangan', 'status' => 'done'],
        ['title' => 'Perulangan', 'status' => 'active'],
        ['title' => 'Array', 'status' => 'locked'],
        ['title' => 'Sorting', 'status' => 'locked'],
    ];
@endphp

<div class="space-y-6">
    <div class="rounded-3xl border border-cyan-200 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-700">Learning Path</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Jalur belajar Anda</h1>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="space-y-5">
                @foreach($path as $step)
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full
                                @if($step['status'] === 'done') bg-emerald-500 text-white
                                @elseif($step['status'] === 'active') bg-blue-500 text-white
                                @else bg-slate-200 text-slate-600 @endif">
                                @if($step['status'] === 'done') ✓ @elseif($step['status'] === 'active') ● @else 🔒 @endif
                            </div>
                            @if(!$loop->last)
                                <div class="mt-1 h-12 w-px bg-slate-200"></div>
                            @endif
                        </div>
                        <div class="flex-1 rounded-xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-lg font-bold text-slate-900">{{ $step['title'] }}</p>
                            <p class="mt-1 text-sm text-slate-600">
                                @if($step['status'] === 'done') Selesai
                                @elseif($step['status'] === 'active') Sedang dipelajari
                                @else Terkunci, selesaikan modul sebelumnya
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Rekomendasi</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Materi berikutnya</h2>
            <div class="mt-5 rounded-xl bg-blue-50 p-4 text-sm text-blue-800 border border-blue-200">
                <p class="font-semibold">Perulangan</p>
                <p class="mt-2">Kamu sedang di tahap ini. Lanjutkan dengan latihan interaktif untuk memperkuat konsep repeat logic.</p>
            </div>
        </div>
    </div>
</div>
@endsection
