@extends('user.layout')

@section('title', 'Smart City')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-amber-700">Smart City</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Layanan publik dan lingkungan</h1>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        @foreach($highlights as $highlight)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm text-slate-500">{{ $highlight['title'] }}</p>
                <p class="mt-3 text-3xl font-black text-slate-900">{{ $highlight['value'] }}</p>
                <p class="mt-1 text-sm text-slate-600">{{ $highlight['meta'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Laporan aktif</p>
                <h2 class="mt-2 text-2xl font-bold text-slate-900">Status wilayah Anda</h2>
            </div>
            <a href="{{ route('user.city.detail') }}" class="inline-flex rounded-xl bg-amber-500 px-4 py-2 text-sm font-semibold text-white">Lihat detail</a>
        </div>

        <div class="mt-5 space-y-4">
            @foreach($reports as $report)
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-lg font-bold text-slate-900">{{ $report['title'] }}</p>
                            <p class="mt-1 text-sm text-slate-600">{{ $report['location'] }}</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="rounded-full bg-amber-100 px-2.5 py-1 text-[10px] font-semibold text-amber-700">{{ $report['priority'] }}</span>
                            <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[10px] font-semibold text-emerald-700">{{ $report['status'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
