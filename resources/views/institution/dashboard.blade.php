@extends('institution.layout')

@section('title', 'Dashboard Institution')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500">Governance dashboard</p>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Institusi</h1>
        </div>
        <button class="btn-primary px-4 py-2 rounded-lg font-medium">Download Report</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">User Aktif</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">1.245</h2>
            <p class="text-sm text-gray-600 mt-2">+12% bulan ini</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Program Aktif</p>
            <h2 class="text-3xl font-bold text-indigo-600 mt-2">18</h2>
            <p class="text-sm text-gray-600 mt-2">Layanan berjalan</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">KPI Terpenuhi</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">86%</h2>
            <p class="text-sm text-gray-600 mt-2">Target stabil</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Laporan Baru</p>
            <h2 class="text-3xl font-bold text-amber-500 mt-2">41</h2>
            <p class="text-sm text-gray-600 mt-2">Perlu review</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Kinerja Institusi</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li>• Kompetensi siswa: 78%</li>
                <li>• Layanan publik: 81%</li>
                <li>• Kualitas data: 92%</li>
                <li>• Kepuasan pengguna: 88%</li>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Prioritas Management</h3>
            <div class="space-y-4 text-sm text-gray-700">
                <div class="bg-blue-50 rounded-lg p-3">
                    <p class="font-semibold text-blue-700">Monitoring program</p>
                    <p>Perbaiki area kompetensi dengan gap tertinggi.</p>
                </div>
                <div class="bg-amber-50 rounded-lg p-3">
                    <p class="font-semibold text-amber-700">Kebijakan layanan</p>
                    <p>Perbarui SOP dan pengelolaan pengguna untuk bulan berikutnya.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
