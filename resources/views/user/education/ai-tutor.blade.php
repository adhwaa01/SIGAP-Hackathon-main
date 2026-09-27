@extends('user.layout')

@section('title', 'AI Tutor')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-violet-200 bg-gradient-to-r from-violet-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-violet-700">SIGAP AI Tutor</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Asisten belajar Anda</h1>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="space-y-4">
            @foreach($messages as $message)
                <div class="flex {{ $message['from'] === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-xl rounded-2xl px-4 py-3 text-sm {{ $message['from'] === 'user' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700' }}">
                        {{ $message['text'] }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex flex-wrap gap-2">
            <button class="rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Jelaskan sederhana</button>
            <button class="rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Berikan contoh</button>
            <button class="rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Berikan latihan</button>
            <button class="rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Tes saya</button>
        </div>

        <div class="mt-6 flex gap-3">
            <input type="text" value="Aku masih bingung tentang perulangan." class="flex-1 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700" />
            <button class="rounded-xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white">Kirim</button>
        </div>
    </div>
</div>
@endsection
