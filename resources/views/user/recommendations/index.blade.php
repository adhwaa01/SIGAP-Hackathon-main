@extends('user.layout')

@section('title', 'Rekomendasi')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Recommendation Center</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Rekomendasi untuk Anda</h1>
        </div>
        <div class="flex flex-wrap gap-2 text-xs font-semibold text-slate-600">
            <span class="rounded-full bg-slate-100 px-3 py-1.5">Semua</span>
            <span class="rounded-full bg-blue-100 px-3 py-1.5 text-blue-700">Education</span>
            <span class="rounded-full bg-amber-100 px-3 py-1.5 text-amber-700">City</span>
            <span class="rounded-full bg-violet-100 px-3 py-1.5 text-violet-700">Layanan</span>
        </div>
    </div>

    <div class="space-y-4">
        @foreach($items as $item)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm {{ $item['tone'] }}">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded-full bg-white/80 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em]">{{ $item['category'] }}</span>
                            <span class="rounded-full bg-white/80 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em]">{{ $item['priority'] }}</span>
                        </div>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">{{ $item['title'] }}</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-700">{{ $item['reason'] }}</p>
                    </div>
                    <div class="flex min-w-[120px] flex-col items-start sm:items-end">
                        <span class="text-sm font-semibold text-slate-700">Estimasi</span>
                        <span class="mt-1 text-lg font-black text-slate-900">{{ $item['time'] }}</span>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs font-medium uppercase tracking-[0.18em] text-slate-500">Relevan untuk Anda</span>
                    <a href="{{ route('user.recommendations.detail') }}" class="rounded-xl bg-white px-4 py-2 text-sm font-semibold shadow-sm text-slate-700 hover:bg-slate-50">{{ $item['button'] }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
