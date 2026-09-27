@extends('user.layout')

@section('title', 'Smart Map')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-amber-700">Smart City</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Peta Lokasi</h1>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <div class="relative h-[420px] overflow-hidden rounded-2xl bg-gradient-to-br from-slate-200 via-slate-100 to-slate-200">
            <div class="absolute inset-0 opacity-20" style="background-image: linear-gradient(rgba(15,23,42,0.15) 1px, transparent 1px), linear-gradient(90deg, rgba(15,23,42,0.15) 1px, transparent 1px); background-size: 28px 28px;"></div>
            <div class="absolute left-[22%] top-[28%] flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white shadow-lg">!</div>
            <div class="absolute left-[52%] top-[38%] flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-white shadow-lg">!</div>
            <div class="absolute left-[70%] top-[56%] flex h-5 w-5 items-center justify-center rounded-full bg-emerald-500 text-[10px] font-bold text-white shadow-lg">✓</div>
            <div class="absolute left-[34%] top-[64%] flex h-5 w-5 items-center justify-center rounded-full bg-violet-500 text-[10px] font-bold text-white shadow-lg">●</div>
        </div>
    </div>
</div>
@endsection
