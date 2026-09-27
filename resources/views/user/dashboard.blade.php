@php
    $recommendations = [
        [
            'title' => 'Pelajari Perulangan Dasar',
            'meta' => 'Kompetensi 60% • Estimasi 30 menit',
            'description' => 'Penguasaan kompetensi Anda masih di bawah target dari 3 minggu terakhir.',
            'action' => 'Mulai Belajar',
            'tone' => 'bg-blue-50 text-blue-700 border-blue-200',
        ],
        [
            'title' => 'Kerjakan latihan Array & List',
            'meta' => 'Latihan adaptif • Level dasar',
            'description' => 'Latihan ini dibuat agar kemampuan Anda meningkat secara bertahap.',
            'action' => 'Lanjutkan',
            'tone' => 'bg-violet-50 text-violet-700 border-violet-200',
        ],
        [
            'title' => 'Layanan Administrasi Kependudukan',
            'meta' => 'Smart City • Tersedia hari ini',
            'description' => 'Berdasarkan kebutuhan Anda, layanan ini kemungkinan paling relevan.',
            'action' => 'Lihat Panduan',
            'tone' => 'bg-amber-50 text-amber-700 border-amber-200',
        ],
    ];

    $activities = [
        ['day' => '28 Sep', 'icon' => '✅', 'title' => 'Menyelesaikan latihan Array & List', 'detail' => 'Score: 90% • 28 menit', 'type' => 'Belajar'],
        ['day' => '27 Sep', 'icon' => '📘', 'title' => 'Membaca materi Pemrograman Dasar', 'detail' => 'Topik: Perulangan dan logika', 'type' => 'Belajar'],
        ['day' => '26 Sep', 'icon' => '📍', 'title' => 'Mengirim laporan lampu jalan mati', 'detail' => 'Lokasi: Jalan Raya Subang', 'type' => 'Laporan'],
        ['day' => '25 Sep', 'icon' => '🤖', 'title' => 'Konsultasi AI Tutor', 'detail' => 'Topik: Nested loop dan debugging', 'type' => 'Sistem'],
    ];

    $competencies = [
        ['name' => 'Variabel', 'value' => 90, 'color' => 'bg-blue-500'],
        ['name' => 'Percabangan', 'value' => 80, 'color' => 'bg-emerald-500'],
        ['name' => 'Perulangan', 'value' => 60, 'color' => 'bg-amber-500'],
        ['name' => 'Array', 'value' => 50, 'color' => 'bg-violet-500'],
        ['name' => 'Function', 'value' => 70, 'color' => 'bg-cyan-500'],
    ];

    $notifications = [
        ['title' => 'Rekomendasi baru', 'text' => 'SIGAP menemukan materi yang sangat relevan untuk Anda hari ini.', 'action' => 'Pelajari'],
        ['title' => 'Laporan diperbarui', 'text' => 'Laporan #SIGAP10291 sedang masuk tahap pengecekan.', 'action' => 'Lihat Status'],
        ['title' => 'Insight AI', 'text' => 'Perulangan Anda masih di bawah target dari 3 minggu terakhir.', 'action' => 'Lihat Detail'],
    ];

    $cityReports = [
        ['title' => 'Lampu Jalan Mati', 'location' => 'Jl. Raya Subang', 'priority' => 'Tinggi', 'status' => 'Diproses'],
        ['title' => 'Saluran Air Tersumbat', 'location' => 'Pasar Kaget', 'priority' => 'Sedang', 'status' => 'Diverifikasi'],
        ['title' => 'Fasilitas Pendidikan', 'location' => 'SMK 2 Subang', 'priority' => 'Rendah', 'status' => 'Selesai'],
    ];
@endphp

@extends('user.layout')

@section('title', 'Dashboard User')

@section('content')
<div class="space-y-7">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-sm font-medium text-slate-500">Halo, Adhwaa 👋</p>
            <h1 class="mt-1 text-3xl font-black tracking-tight text-slate-900">Selamat datang di SIGAP</h1>
        </div>
        <button class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
            Lihat Rekomendasi
        </button>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">SIGAP Insight</p>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h2 class="text-4xl font-black text-blue-600">82</h2>
                    <p class="mt-1 text-sm text-emerald-600">Kondisi sehat</p>
                </div>
                <span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-700">+8%</span>
            </div>
        </div>

        <div class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50 to-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Progress</p>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h2 class="text-4xl font-black text-violet-600">78%</h2>
                    <p class="mt-1 text-sm text-slate-600">Meningkat 18%</p>
                </div>
                <span class="rounded-full bg-violet-100 px-2 py-1 text-xs font-semibold text-violet-700">Target</span>
            </div>
        </div>

        <div class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50 to-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Laporan Saya</p>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h2 class="text-4xl font-black text-amber-600">04</h2>
                    <p class="mt-1 text-sm text-slate-600">2 sedang diproses</p>
                </div>
                <span class="rounded-full bg-amber-100 px-2 py-1 text-xs font-semibold text-amber-700">Aktif</span>
            </div>
        </div>

        <div class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">AI Assistant</p>
            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h2 class="text-4xl font-black text-emerald-600">12</h2>
                    <p class="mt-1 text-sm text-slate-600">Konsultasi hari ini</p>
                </div>
                <span class="rounded-full bg-emerald-100 px-2 py-1 text-xs font-semibold text-emerald-700">Live</span>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">SIGAP Intelligence</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Deteksi insight Anda</h2>
                </div>
                <button class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700">Kenapa?</button>
            </div>

            <div class="mt-6 flex items-center gap-6">
                <div class="flex h-28 w-28 items-center justify-center rounded-full bg-gradient-to-br from-violet-500 to-blue-500 text-4xl font-black text-white shadow-lg shadow-violet-200">
                    82
                </div>
                <div class="flex-1">
                    <div class="rounded-xl bg-violet-50 p-4 text-sm text-violet-800 border border-violet-200">
                        <p class="font-semibold">Kompetensi Perulangan perlu diperkuat</p>
                        <p class="mt-2 text-violet-700">Berdasarkan hasil latihan 3 minggu terakhir, penguasaan materi Anda masih berada di bawah target.</p>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="mb-3 flex items-center justify-between text-sm text-slate-600">
                    <span>Perkembangan Anda</span>
                    <span class="font-semibold text-slate-800">Jul • Aug • Sep</span>
                </div>
                <div class="flex h-28 items-end gap-3 rounded-2xl bg-slate-50 p-4">
                    <div class="flex h-full w-full items-end justify-around gap-2">
                        <div class="w-1/5 rounded-t-xl bg-blue-200/80" style="height: 35%"></div>
                        <div class="w-1/5 rounded-t-xl bg-blue-300/90" style="height: 50%"></div>
                        <div class="w-1/5 rounded-t-xl bg-violet-400" style="height: 62%"></div>
                        <div class="w-1/5 rounded-t-xl bg-violet-500" style="height: 76%"></div>
                        <div class="w-1/5 rounded-t-xl bg-blue-600" style="height: 82%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Quick Action</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Aksi cepat</h2>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-2 gap-3">
                <button class="rounded-xl border border-blue-200 bg-blue-50 p-4 text-left text-sm font-semibold text-blue-700">🎓 Belajar</button>
                <button class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-left text-sm font-semibold text-amber-700">🏙️ Lapor</button>
                <button class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-left text-sm font-semibold text-emerald-700">📊 Progress</button>
                <button class="rounded-xl border border-violet-200 bg-violet-50 p-4 text-left text-sm font-semibold text-violet-700">🗺️ Peta</button>
            </div>

            <div class="mt-6 rounded-xl bg-slate-50 p-4">
                <p class="text-sm text-slate-500">SIGAP Score</p>
                <div class="mt-2 flex items-center justify-between">
                    <span class="text-3xl font-black text-slate-900">82</span>
                    <span class="rounded-full bg-emerald-100 px-2 py-1 text-xs font-semibold text-emerald-700">Baik</span>
                </div>
                <div class="mt-4 space-y-3 text-sm text-slate-600">
                    <div class="flex items-center justify-between"><span>Progress</span><span class="font-semibold text-slate-800">78%</span></div>
                    <div class="flex items-center justify-between"><span>Aktivitas</span><span class="font-semibold text-slate-800">85%</span></div>
                    <div class="flex items-center justify-between"><span>Konsistensi</span><span class="font-semibold text-slate-800">80%</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Rekomendasi</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Apa yang sebaiknya Anda lakukan?</h2>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                @foreach($recommendations as $item)
                    <div class="rounded-xl border p-4 {{ $item['tone'] }}">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>
                                <p class="mt-1 text-sm opacity-80">{{ $item['meta'] }}</p>
                            </div>
                            <button class="rounded-lg bg-white/80 px-3 py-2 text-xs font-semibold shadow-sm">{{ $item['action'] }}</button>
                        </div>
                        <p class="mt-3 text-sm opacity-90">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Notifikasi</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Aktivitas penting</h2>
                </div>
            </div>

            <div class="mt-5 space-y-3">
                @foreach($notifications as $notification)
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="font-semibold text-slate-800">{{ $notification['title'] }}</p>
                                <p class="mt-1 text-sm text-slate-600">{{ $notification['text'] }}</p>
                            </div>
                            <button class="rounded-lg bg-white px-2.5 py-1.5 text-[11px] font-semibold text-slate-700 shadow-sm">{{ $notification['action'] }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Aktivitas</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Timeline aktivitas</h2>
                </div>
                <div class="flex gap-2 text-xs font-semibold text-slate-500">
                    <span class="rounded-full bg-slate-100 px-2 py-1">Semua</span>
                    <span class="rounded-full px-2 py-1">Belajar</span>
                    <span class="rounded-full px-2 py-1">Laporan</span>
                </div>
            </div>

            <div class="mt-6 space-y-5">
                @foreach($activities as $item)
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-lg">{{ $item['icon'] }}</div>
                            @if(!$loop->last)
                                <div class="mt-2 h-full w-px bg-slate-200"></div>
                            @endif
                        </div>
                        <div class="flex-1 rounded-xl border border-slate-200 bg-slate-50 p-4">
                            <div class="flex items-center justify-between gap-2">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $item['day'] }}</p>
                                <span class="rounded-full bg-blue-100 px-2 py-1 text-[10px] font-semibold text-blue-700">{{ $item['type'] }}</span>
                            </div>
                            <h3 class="mt-2 text-base font-bold text-slate-800">{{ $item['title'] }}</h3>
                            <p class="mt-1 text-sm text-slate-600">{{ $item['detail'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Education</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Competency Map</h2>
                </div>
            </div>

            <div class="mt-6 space-y-4">
                @foreach($competencies as $competency)
                    <div>
                        <div class="mb-1 flex items-center justify-between text-sm text-slate-700">
                            <span>{{ $competency['name'] }}</span>
                            <span class="font-semibold">{{ $competency['value'] }}%</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-200">
                            <div class="h-full rounded-full {{ $competency['color'] }}" style="width: {{ $competency['value'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Smart City</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Laporan dan kebutuhan publik</h2>
                </div>
            </div>

            <div class="mt-5 space-y-3">
                @foreach($cityReports as $report)
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-base font-bold text-slate-800">{{ $report['title'] }}</h3>
                            <span class="rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">{{ $report['priority'] }}</span>
                        </div>
                        <p class="mt-2 text-sm text-slate-600">{{ $report['location'] }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs font-medium uppercase tracking-[0.18em] text-slate-400">Status</span>
                            <span class="text-sm font-semibold text-slate-700">{{ $report['status'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Profil</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Adhwaa Rajib Aqiilah</h2>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="flex items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-violet-500 text-xl font-black text-white">AR</div>
                    <div>
                        <p class="text-lg font-bold text-slate-800">Learner</p>
                        <p class="text-sm text-slate-500">Politeknik Negeri Subang</p>
                    </div>
                </div>

                <div class="space-y-2 text-sm text-slate-600">
                    <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2"><span>Data diri</span><span class="font-semibold text-slate-800">Lengkap</span></div>
                    <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2"><span>Preferensi</span><span class="font-semibold text-slate-800">AI & lokasi</span></div>
                    <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2"><span>Privasi</span><span class="font-semibold text-slate-800">Aktif</span></div>
                    <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2"><span>Keamanan</span><span class="font-semibold text-slate-800">Terjaga</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
