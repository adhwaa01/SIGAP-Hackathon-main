@extends('mentor.layout')

@section('title', 'Dashboard Mentor')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500">Monitoring kelas</p>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Mentor</h1>
        </div>
        <button class="btn-primary px-4 py-2 rounded-lg font-medium">Buat Assessment</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Peserta</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">32</h2>
            <p class="text-sm text-gray-600 mt-2">+2 minggu ini</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Rata-rata Progress</p>
            <h2 class="text-3xl font-bold text-indigo-600 mt-2">78%</h2>
            <p class="text-sm text-gray-600 mt-2">Target kelas</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Perlu Perhatian</p>
            <h2 class="text-3xl font-bold text-amber-500 mt-2">05</h2>
            <p class="text-sm text-gray-600 mt-2">Early warning aktif</p>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <p class="text-sm text-gray-500">Intervensi</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">03</h2>
            <p class="text-sm text-gray-600 mt-2">Menunggu tindak lanjut</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Kompetensi Kelas</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li>• Pemrograman: 82%</li>
                <li>• Database: 91%</li>
                <li>• Algoritma: 62%</li>
                <li>• Jaringan: 73%</li>
                <li>• UI/UX: 68%</li>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Area Intervensi</h3>
            <div class="space-y-4 text-sm text-gray-700">
                <div class="bg-red-50 rounded-lg p-3">
                    <p class="font-semibold text-red-700">Algoritma</p>
                    <p>3 siswa mengalami penurunan performa minggu ini.</p>
                </div>
                <div class="bg-blue-50 rounded-lg p-3">
                    <p class="font-semibold text-blue-700">Array</p>
                    <p>Tambahkan latihan berbasis problem solving untuk penguatan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
