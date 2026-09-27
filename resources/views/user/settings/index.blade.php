@extends('user.layout')

@section('title', 'Pengaturan')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Pengaturan</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Preferensi akun</h1>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        @foreach($sections as $section)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-lg font-bold text-slate-900">{{ $section['label'] }}</p>
                        <p class="mt-1 text-sm text-slate-600">{{ $section['value'] }}</p>
                    </div>
                    <button class="rounded-xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700">Atur</button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Keamanan</p>
                <h2 class="mt-2 text-2xl font-bold text-slate-900">Akun dan privasi</h2>
            </div>
            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Aman</span>
        </div>

        <div class="mt-5 grid gap-4 md:grid-cols-3">
            <div class="rounded-xl bg-slate-50 p-4">
                <p class="text-sm text-slate-500">Password</p>
                <p class="mt-2 font-semibold text-slate-800">Terakhir diperbarui 2 bulan lalu</p>
            </div>
            <div class="rounded-xl bg-slate-50 p-4">
                <p class="text-sm text-slate-500">2FA</p>
                <p class="mt-2 font-semibold text-slate-800">Belum aktif</p>
            </div>
            <div class="rounded-xl bg-slate-50 p-4">
                <p class="text-sm text-slate-500">Privasi</p>
                <p class="mt-2 font-semibold text-slate-800">Kontrol penuh tersedia</p>
            </div>
        </div>
    </div>
</div>
@endsection
