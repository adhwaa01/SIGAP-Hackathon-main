@extends('user.layout')

@section('title', 'Detail Intelligence')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Insight Detail</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Kompetensi Perulangan membutuhkan penguatan</h1>
        </div>
        <button class="rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-700">Kenapa?</button>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-5">
                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-violet-500 to-blue-500 text-3xl font-black text-white">82</div>
                <div>
                    <p class="text-sm text-slate-500">Insight Score</p>
                    <h2 class="mt-2 text-3xl font-black text-slate-900">Intelligence</h2>
                    <p class="mt-2 text-sm text-slate-600">Penguasaan materi Anda meningkat 18% dalam 3 minggu terakhir, namun masih belum mencapai target.</p>
                </div>
            </div>

            <div class="mt-6 rounded-2xl bg-slate-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Trend</p>
                <div class="mt-4 flex h-28 items-end gap-3">
                    <div class="w-1/5 rounded-t-xl bg-blue-200/80" style="height: 35%"></div>
                    <div class="w-1/5 rounded-t-xl bg-blue-300/90" style="height: 50%"></div>
                    <div class="w-1/5 rounded-t-xl bg-violet-400" style="height: 62%"></div>
                    <div class="w-1/5 rounded-t-xl bg-violet-500" style="height: 76%"></div>
                    <div class="w-1/5 rounded-t-xl bg-blue-600" style="height: 82%"></div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-bold text-slate-900">Mengapa SIGAP memberikan insight ini?</h3>
                <ul class="mt-4 space-y-3 text-sm leading-6 text-slate-600">
                    @foreach($factors as $factor)
                        <li class="flex gap-3">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 flex-shrink-0 rounded-full bg-violet-500"></span>
                            <span>{{ $factor }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="space-y-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">AI explanation</p>
                <h2 class="mt-2 text-2xl font-bold text-slate-900">Penjelasan SIGAP</h2>
                <p class="mt-4 text-sm leading-6 text-slate-600">
                    Berdasarkan pola aktivitas belajar Anda, level pemahaman pada materi perulangan belum stabil. Anda cenderung mengerjakan soal dengan benar saat proses latihan singkat, namun belum konsisten saat menghadapi soal yang sedikit lebih kompleks.
                </p>
            </div>

            <div class="rounded-2xl border border-blue-200 bg-blue-50 p-6 shadow-sm">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-blue-700">Recommended Action</p>
                <h3 class="mt-2 text-xl font-bold text-blue-900">Lanjutkan dengan pelajaran yang lebih fokus</h3>
                <ul class="mt-4 space-y-2 text-sm text-blue-800">
                    <li>• Kerjakan 2 latihan interaktif berikutnya</li>
                    <li>• Ulang materi dasar nested loop</li>
                    <li>• Gunakan AI Tutor untuk penjelasan sederhana</li>
                </ul>
                <button class="mt-5 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Mulai Sekarang</button>
            </div>
        </div>
    </div>
</div>
@endsection
