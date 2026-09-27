@extends('user.layout')

@section('title', 'Keamanan')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Keamanan</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Akun dan sesi</h1>
    </div>

    <div class="space-y-4">
        @foreach($items as $item)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-lg font-bold text-slate-900">{{ $item['label'] }}</p>
                        <p class="mt-1 text-sm text-slate-600">{{ $item['value'] }}</p>
                    </div>
                    <button class="rounded-xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Atur</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
