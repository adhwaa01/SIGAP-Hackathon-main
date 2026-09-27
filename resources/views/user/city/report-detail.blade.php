@extends('user.layout')

@section('title', 'Detail Laporan')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-amber-700">Laporan</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">{{ $report['title'] }}</h1>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-wrap items-center gap-3">
                <span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">{{ $report['priority'] }}</span>
                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">{{ $report['status'] }}</span>
            </div>

            <div class="mt-5 rounded-2xl bg-slate-100 p-5 text-sm text-slate-600">
                <p class="font-semibold text-slate-900">Lokasi</p>
                <p class="mt-2">{{ $report['location'] }}</p>
                <p class="mt-5 font-semibold text-slate-900">Deskripsi</p>
                <p class="mt-2">{{ $report['description'] }}</p>
            </div>

            <div class="mt-6 rounded-xl bg-slate-50 p-4">
                <p class="font-semibold text-slate-900">Timeline</p>
                <ul class="mt-3 space-y-3">
                    @foreach($report['timeline'] as $step)
                        <li class="flex gap-3 text-sm text-slate-600">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-amber-500"></span>
                            <span>{{ $step }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Tindakan</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Status penanganan</h2>

            <div class="mt-5 space-y-3">
                <button class="w-full rounded-xl bg-amber-500 px-4 py-3 text-sm font-semibold text-white">Tandai sedang ditangani</button>
                <button class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">Lihat peta lokasi</button>
                <button class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">Hubungi petugas</button>
            </div>
        </div>
    </div>
</div>
@endsection
