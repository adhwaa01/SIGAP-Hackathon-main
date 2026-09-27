@extends('teacher.layout')

@section('title', 'Dashboard Teacher')

@section('content')
@php
    $statusColors = [
        'Need Attention' => 'bg-red-100 text-red-700',
        'Improving' => 'bg-amber-100 text-amber-700',
        'On Track' => 'bg-emerald-100 text-emerald-700',
    ];

    $topStats = [
        ['label' => 'Total Siswa', 'value' => count($students), 'meta' => '+12% vs minggu lalu', 'tone' => 'bg-blue-50 text-blue-700'],
        ['label' => 'Rata-rata Kelas', 'value' => '78%', 'meta' => 'Tingkat pencapaian', 'tone' => 'bg-violet-50 text-violet-700'],
        ['label' => 'Butuh Perhatian', 'value' => '06', 'meta' => '2 siswa kritis', 'tone' => 'bg-amber-50 text-amber-700'],
        ['label' => 'Assessment', 'value' => '24', 'meta' => 'Selesai bulan ini', 'tone' => 'bg-emerald-50 text-emerald-700'],
    ];
@endphp

<div class="space-y-6">
    <div class="rounded-[28px] bg-gradient-to-r from-[#0B132B] via-[#0f1c3d] to-[#1d4ed8] p-6 text-white shadow-lg shadow-blue-900/20">
        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 text-xl font-black text-white ring-1 ring-white/10">
                    S
                </div>
                <div>
                    <div class="text-3xl font-black tracking-tight">SIGAP</div>
                    <p class="text-xs uppercase tracking-[0.28em] text-blue-100/80">Teacher Panel</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2 text-sm text-blue-100">
                <span class="rounded-full bg-white/10 px-3 py-2">Smart Education</span>
                <span class="rounded-full bg-white/10 px-3 py-2">Smart City</span>
                <span class="rounded-full bg-white/10 px-3 py-2">Guidance</span>
                <span class="rounded-full bg-white/10 px-3 py-2">Action</span>
            </div>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach($topStats as $stat)
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                    <span class="rounded-full px-2 py-1 text-[10px] font-semibold {{ $stat['tone'] }}">Live</span>
                </div>
                <div class="mt-4 text-4xl font-black tracking-tight text-slate-900">{{ $stat['value'] }}</div>
                <p class="mt-2 text-xs text-slate-500">{{ $stat['meta'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.3fr_0.7fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Overview</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900">Student Performance</h2>
                </div>
                <button class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700">This Month</button>
            </div>

            <div class="mt-6 rounded-2xl bg-slate-50 p-4">
                <div class="mb-5 flex items-end justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Class Average</p>
                        <p class="mt-2 text-4xl font-black text-slate-900">78%</p>
                    </div>
                    <div class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">+8.2%</div>
                </div>

                <div class="flex h-32 items-end gap-3">
                    <div class="flex h-full w-full items-end justify-around gap-2">
                        <div class="w-1/5 rounded-t-xl bg-blue-200" style="height: 45%"></div>
                        <div class="w-1/5 rounded-t-xl bg-blue-300" style="height: 55%"></div>
                        <div class="w-1/5 rounded-t-xl bg-violet-400" style="height: 68%"></div>
                        <div class="w-1/5 rounded-t-xl bg-violet-500" style="height: 76%"></div>
                        <div class="w-1/5 rounded-t-xl bg-blue-600" style="height: 82%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Quick Action</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Aksi Cepat</h2>

            <div class="mt-5 grid grid-cols-2 gap-3">
                <button class="rounded-xl border border-blue-200 bg-blue-50 p-4 text-left text-sm font-semibold text-blue-700">📘 Kelas</button>
                <button class="rounded-xl border border-violet-200 bg-violet-50 p-4 text-left text-sm font-semibold text-violet-700">🧠 AI</button>
                <button class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-left text-sm font-semibold text-emerald-700">📊 Nilai</button>
                <button class="rounded-xl border border-amber-200 bg-amber-50 p-4 text-left text-sm font-semibold text-amber-700">📢 Pengumuman</button>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Student List</p>
                <h2 class="mt-2 text-2xl font-bold text-slate-900">Daftar Siswa</h2>
            </div>
            <button class="rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white">Export</button>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Nama Siswa</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Avg. Mastery</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Aktivitas</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @foreach($students as $student)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-violet-500 text-sm font-black text-white">
                                        {{ strtoupper(substr($student['name'], 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-900">{{ $student['name'] }}</div>
                                        <div class="text-xs text-slate-500">{{ $student['email'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-sm font-semibold text-slate-800">
                                <span class="{{ $student['avg_mastery'] < 50 ? 'text-red-600' : ($student['avg_mastery'] < 75 ? 'text-amber-600' : 'text-emerald-600') }}">
                                    {{ $student['avg_mastery'] }}%
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <span class="inline-flex rounded-full px-2.5 py-1 text-[11px] font-semibold {{ $statusColors[$student['status']] ?? 'bg-slate-100 text-slate-700' }}">
                                    {{ $student['status'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-600">{{ $student['last_active'] }}</td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('teacher.student', $student['id']) }}" class="inline-flex rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700">Detail →</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
