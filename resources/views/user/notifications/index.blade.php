@extends('user.layout')

@section('title', 'Notifikasi')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Notifikasi</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Aktivitas penting</h1>
        </div>
        <div class="flex gap-2 text-xs font-semibold text-slate-600">
            <span class="rounded-full bg-slate-100 px-3 py-1.5">Semua</span>
            <span class="rounded-full bg-blue-100 px-3 py-1.5 text-blue-700">Belum dibaca</span>
            <span class="rounded-full bg-amber-100 px-3 py-1.5 text-amber-700">Penting</span>
        </div>
    </div>

    <div class="space-y-4">
        @foreach($items as $item)
            <div class="rounded-2xl border {{ $item['read'] ? 'border-slate-200 bg-white' : 'border-blue-200 bg-blue-50' }} p-4 shadow-sm">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="rounded-full bg-white px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-600">{{ $item['type'] }}</span>
                            @if(!$item['read'])
                                <span class="rounded-full bg-red-100 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-red-700">Baru</span>
                            @endif
                        </div>
                        <h3 class="mt-3 text-lg font-bold text-slate-900">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $item['summary'] }}</p>
                    </div>

                    <div class="flex flex-col items-end gap-2">
                        <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $item['time'] }}</span>
                        <button class="rounded-xl bg-white px-3 py-2 text-xs font-semibold text-slate-700 shadow-sm">Lihat</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
