@extends('user.layout')

@section('title', 'SIGAP Intelligence')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">SIGAP Intelligence</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Analisis kondisi Anda</h1>
        </div>
        <a href="{{ route('user.intelligence.detail') }}" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
            Lihat Detail
        </a>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-violet-200 bg-violet-50 p-5 shadow-sm">
            <p class="text-sm text-violet-700">Intelligence Score</p>
            <div class="mt-4 text-4xl font-black text-violet-700">82</div>
            <p class="mt-2 text-sm text-violet-800">Kondisi sehat</p>
        </div>
        <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5 shadow-sm">
            <p class="text-sm text-blue-700">Insight</p>
            <div class="mt-4 text-2xl font-black text-blue-700">2 hal</div>
            <p class="mt-2 text-sm text-blue-800">Perlu perhatian</p>
        </div>
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm">
            <p class="text-sm text-emerald-700">Trend</p>
            <div class="mt-4 text-2xl font-black text-emerald-700">+18%</div>
            <p class="mt-2 text-sm text-emerald-800">3 minggu terakhir</p>
        </div>
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 shadow-sm">
            <p class="text-sm text-amber-700">Perhatian</p>
            <div class="mt-4 text-2xl font-black text-amber-700">Moderate</div>
            <p class="mt-2 text-sm text-amber-800">Butuh tindakan</p>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-slate-900">Insight yang terdeteksi</h2>
                <span class="rounded-full bg-blue-100 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-blue-700">Live</span>
            </div>

            <div class="space-y-4">
                @foreach($insights as $insight)
                    <div class="rounded-2xl border {{ $insight['tone'] }} p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/70 text-xl shadow-sm">{{ $insight['icon'] }}</div>
                                <div>
                                    <p class="text-[10px] font-semibold uppercase tracking-[0.22em] opacity-70">{{ $insight['badge'] }}</p>
                                    <h3 class="mt-1 text-lg font-bold">{{ $insight['title'] }}</h3>
                                </div>
                            </div>
                            <span class="rounded-full bg-white/70 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.18em]">{{ $insight['priority'] }}</span>
                        </div>

                        <p class="mt-3 text-sm leading-6 opacity-90">{{ $insight['description'] }}</p>

                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-xs font-medium uppercase tracking-[0.18em] opacity-70">{{ $insight['time'] }}</span>
                            <span class="text-sm font-bold">{{ $insight['trend'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Recommended Action</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Langkah yang disarankan</h2>

            <div class="mt-6 space-y-4">
                <div class="rounded-xl bg-blue-50 border border-blue-200 p-4">
                    <p class="text-sm font-semibold text-blue-800">Pelajari perulangan dasar</p>
                    <p class="mt-2 text-sm text-blue-700">Estimasi: 30 menit • Level dasar</p>
                </div>
                <div class="rounded-xl bg-violet-50 border border-violet-200 p-4">
                    <p class="text-sm font-semibold text-violet-800">Kerjakan latihan Array</p>
                    <p class="mt-2 text-sm text-violet-700">Target: kuasai 3 soal berikutnya</p>
                </div>
                <div class="rounded-xl bg-amber-50 border border-amber-200 p-4">
                    <p class="text-sm font-semibold text-amber-800">Ajukan laporan layanan</p>
                    <p class="mt-2 text-sm text-amber-700">Pola kebutuhan publik meningkat di sekitar Anda</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
