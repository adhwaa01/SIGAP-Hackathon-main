@extends('user.layout')

@section('title', 'Public Service')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-amber-700">Public Service</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Layanan publik</h1>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-4">
            <label class="mb-2 block text-sm font-semibold text-slate-700">Cari layanan</label>
            <input type="text" value="Saya ingin membuat KTP" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700" />
        </div>

        <div class="space-y-4">
            @foreach($services as $service)
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between gap-3">
                        <p class="text-xl font-bold text-slate-900">{{ $service['title'] }}</p>
                        <span class="rounded-full bg-blue-100 px-2.5 py-1 text-[10px] font-semibold text-blue-700">Tersedia</span>
                    </div>
                    <div class="mt-4 grid gap-3 md:grid-cols-2">
                        <div>
                            <p class="text-sm font-semibold text-slate-700">Persyaratan</p>
                            <ul class="mt-2 list-inside list-disc text-sm text-slate-600">
                                @foreach($service['requirements'] as $requirement)
                                    <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="rounded-xl bg-white p-4">
                            <p class="text-sm font-semibold text-slate-700">Lokasi</p>
                            <p class="mt-2 text-sm text-slate-600">{{ $service['location'] }}</p>
                            <p class="mt-3 text-sm font-semibold text-slate-700">Jam layanan</p>
                            <p class="mt-2 text-sm text-slate-600">{{ $service['hours'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
