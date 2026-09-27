@extends('admin.layout')

@section('title', 'Dashboard System Admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500">System monitoring</p>
            <h1 class="text-3xl font-bold text-gray-900">System Dashboard</h1>
        </div>
        <button class="btn-primary px-4 py-2 rounded-lg font-medium">Audit Log</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">User Total</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">4.982</h2>
            <p class="text-sm text-gray-600 mt-2">+48 hari ini</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Institusi</p>
            <h2 class="text-3xl font-bold text-indigo-600 mt-2">42</h2>
            <p class="text-sm text-gray-600 mt-2">Aktif</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">AI Jobs</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">1.214</h2>
            <p class="text-sm text-gray-600 mt-2">Berjalan normal</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Security Events</p>
            <h2 class="text-3xl font-bold text-red-500 mt-2">03</h2>
            <p class="text-sm text-gray-600 mt-2">Butuh perhatian</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">System Health</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li>• API Status: Normal</li>
                <li>• Database: Stable</li>
                <li>• AI Service: Healthy</li>
                <li>• Notification Queue: Running</li>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Management Focus</h3>
            <div class="space-y-4 text-sm text-gray-700">
                <div class="bg-blue-50 rounded-lg p-3">
                    <p class="font-semibold text-blue-700">Role &amp; Permission</p>
                    <p>Audit akses untuk institusi baru dan user prioritas.</p>
                </div>
                <div class="bg-amber-50 rounded-lg p-3">
                    <p class="font-semibold text-amber-700">AI Config</p>
                    <p>Periksa rekomendasi model serta konfigurasi policy.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
