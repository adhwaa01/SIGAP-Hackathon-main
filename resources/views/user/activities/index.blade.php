@extends('user.layout')

@section('title', 'Aktivitas')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Aktivitas</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Timeline aktivitas</h1>
        </div>
        <div class="flex flex-wrap gap-2 text-xs font-semibold text-slate-600">
            <span class="rounded-full bg-slate-100 px-3 py-1.5">Semua</span>
            <span class="rounded-full bg-blue-100 px-3 py-1.5 text-blue-700">Belajar</span>
            <span class="rounded-full bg-violet-100 px-3 py-1.5 text-violet-700">Assessment</span>
            <span class="rounded-full bg-amber-100 px-3 py-1.5 text-amber-700">Laporan</span>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="space-y-5">
            @foreach($items as $item)
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100 text-lg">{{ $item['icon'] }}</div>
                        @if(!$loop->last)
                            <div class="mt-2 h-full w-px bg-slate-200"></div>
                        @endif
                    </div>

                    <div class="flex-1 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $item['date'] }}</span>
                            <span class="rounded-full bg-blue-100 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-700">{{ $item['type'] }}</span>
                        </div>
                        <h3 class="mt-2 text-lg font-bold text-slate-900">{{ $item['title'] }}</h3>
                        <p class="mt-1 text-sm text-slate-600">{{ $item['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
