@extends('user.layout')

@section('title', 'Detail Rekomendasi')

@section('content')
<div class="space-y-6">
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Detail Rekomendasi</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Pelajari Array dan List</h1>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">Kompetensi Array masih berada di bawah target berdasarkan hasil assessment terakhir. Aktivitas belajar Anda menunjukan pola yang cocok untuk memulai materi ini hari ini.</p>
            </div>
            <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.18em] text-blue-700">Tinggi</span>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-2xl font-bold text-slate-900">Alasan SIGAP</h2>
            <div class="mt-5 space-y-4 text-sm leading-6 text-slate-600">
                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="font-semibold text-slate-800">Data pendukung</p>
                    <p class="mt-2">Rata-rata hasil latihan untuk materi Array Anda mencapai 58%, di bawah target 75% yang dibutuhkan untuk melanjutkan materi berikutnya.</p>
                </div>
                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="font-semibold text-slate-800">Estimasi waktu</p>
                    <p class="mt-2">30 menit dengan pendekatan belajar adaptif dan 2 latihan interaktif.</p>
                </div>
                <div class="rounded-xl bg-slate-50 p-4">
                    <p class="font-semibold text-slate-800">Tingkat prioritas</p>
                    <p class="mt-2">Prioritas tinggi karena materi ini memengaruhi beberapa kompetensi lanjutan.</p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-blue-200 bg-blue-50 p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-blue-700">Langkah tindakan</p>
            <h2 class="mt-2 text-2xl font-bold text-blue-900">Mulai sekarang</h2>
            <ol class="mt-5 space-y-3 text-sm text-blue-800">
                <li>1. Buka materi Array Basic</li>
                <li>2. Selesaikan 3 latihan pendek</li>
                <li>3. Ulang kembali 1 soal evaluasi</li>
                <li>4. Kembali ke dashboard untuk melihat progress</li>
            </ol>
            <button class="mt-6 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Mulai Belajar</button>
        </div>
    </div>
</div>
@endsection
