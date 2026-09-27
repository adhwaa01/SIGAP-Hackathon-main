@extends('user.layout')

@section('title', 'Privasi')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Privasi</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Kontrol data Anda</h1>
    </div>

    <div class="space-y-4">
        @foreach($items as $item)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-lg font-bold text-slate-900">{{ $item['label'] }}</p>
                        <p class="mt-1 text-sm text-slate-600">{{ $item['value'] }}</p>
                    </div>
                    <button class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700">Kelola</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
