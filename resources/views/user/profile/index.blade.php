@extends('user.layout')

@section('title', 'Profil Saya')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-violet-500 text-2xl font-black text-white shadow-lg shadow-blue-200">
                    A
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ $profile['role'] }}</p>
                    <h1 class="mt-1 text-3xl font-black text-slate-900">{{ $profile['name'] }}</h1>
                    <p class="mt-1 text-sm text-slate-600">{{ $profile['location'] }}</p>
                </div>
            </div>

            <button class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700">Edit Profil</button>
        </div>

        <div class="mt-6 flex flex-wrap gap-2">
            @foreach($profile['badges'] as $badge)
                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">{{ $badge }}</span>
            @endforeach
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        @foreach($profile['stats'] as $stat)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                <p class="mt-3 text-3xl font-black text-slate-900">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Profil</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Informasi utama</h2>

            <div class="mt-5 space-y-4 text-sm text-slate-600">
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <span>Email</span>
                    <span class="font-semibold text-slate-800">{{ $profile['email'] }}</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <span>Fokus pembelajaran</span>
                    <span class="font-semibold text-slate-800">{{ $profile['focus'] }}</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <span>Institusi</span>
                    <span class="font-semibold text-slate-800">{{ $profile['institution'] }}</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <span>Lokasi</span>
                    <span class="font-semibold text-slate-800">{{ $profile['location'] }}</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <span>Anggota sejak</span>
                    <span class="font-semibold text-slate-800">{{ $profile['memberSince'] }}</span>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Ringkasan</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Kinerja Anda</h2>

            <div class="mt-5 space-y-4">
                <div>
                    <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                        <span>Progress belajar</span>
                        <span class="font-semibold text-slate-900">78%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-200">
                        <div class="h-2.5 w-[78%] rounded-full bg-gradient-to-r from-blue-500 to-violet-500"></div>
                    </div>
                </div>

                <div>
                    <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                        <span>Smart City engagement</span>
                        <span class="font-semibold text-slate-900">63%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-200">
                        <div class="h-2.5 w-[63%] rounded-full bg-gradient-to-r from-amber-400 to-orange-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
