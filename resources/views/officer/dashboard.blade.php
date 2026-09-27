@extends('officer.layout')

@section('title', 'Dashboard Officer')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500">Monitoring pelayanan publik</p>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Petugas</h1>
        </div>
        <button class="btn-primary px-4 py-2 rounded-lg font-medium">Lihat Prioritas</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Total Laporan</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">247</h2>
            <p class="text-sm text-gray-600 mt-2">Hari ini</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Selesai</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">181</h2>
            <p class="text-sm text-gray-600 mt-2">73% selesai</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Diproses</p>
            <h2 class="text-3xl font-bold text-amber-500 mt-2">42</h2>
            <p class="text-sm text-gray-600 mt-2">Butuh review</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Prioritas Tinggi</p>
            <h2 class="text-3xl font-bold text-red-500 mt-2">08</h2>
            <p class="text-sm text-gray-600 mt-2">Segera ditangani</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Peta Prioritas</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li>• Jalan rusak: 8 titik</li>
                <li>• Lampu mati: 5 titik</li>
                <li>• Sampah menumpuk: 12 titik</li>
                <li>• Saluran drainase: 4 titik</li>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Tugas Saya</h3>
            <div class="space-y-4 text-sm text-gray-700">
                <div class="bg-blue-50 rounded-lg p-3">
                    <p class="font-semibold text-blue-700">Jalan Rusak - Jl. Pendidikan</p>
                    <p>Urgensi tinggi, perlu dispatch hari ini.</p>
                </div>
                <div class="bg-amber-50 rounded-lg p-3">
                    <p class="font-semibold text-amber-700">Lampu Jalan - RT 05</p>
                    <p>Verifikasi teknis dan estimasi perbaikan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
