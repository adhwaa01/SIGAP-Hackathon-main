@extends('user.layout')

@section('title', 'Smart Report')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-amber-200 bg-gradient-to-r from-amber-50 to-orange-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-amber-700">Smart Report</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Buat Laporan</h1>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="space-y-4">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                    <select class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700">
                        <option>Jalan rusak</option>
                        <option>Sampah</option>
                        <option>Lampu jalan</option>
                        <option>Fasilitas umum</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Lokasi</label>
                    <input type="text" value="Jl. Raya Subang" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700" />
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
                    <textarea rows="5" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700">Lampu jalan di sekitar pasar mulai mati dan membuat area menjadi gelap.</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Upload foto</label>
                    <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-6 text-center text-sm text-slate-500">
                        Drag & drop atau pilih foto
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Ringkasan</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Laporan Anda</h2>

            <div class="mt-5 space-y-4">
                @foreach($items as $item)
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-center justify-between gap-2">
                            <p class="font-semibold text-slate-900">{{ $item['title'] }}</p>
                            <span class="rounded-full bg-amber-100 px-2 py-1 text-[10px] font-semibold text-amber-700">{{ $item['priority'] }}</span>
                        </div>
                        <p class="mt-2 text-sm text-slate-600">{{ $item['category'] }}</p>
                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $item['status'] }}</p>
                    </div>
                @endforeach
            </div>

            <button class="mt-6 w-full rounded-xl bg-amber-500 px-4 py-3 text-sm font-semibold text-white">Kirim Laporan</button>
        </div>
    </div>
</div>
@endsection
