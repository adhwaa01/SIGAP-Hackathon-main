@extends('teacher.layout')

@section('title', 'Detail Siswa - ' . $student->name)

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('teacher.dashboard') }}" class="text-blue-600 hover:underline text-sm flex items-center mb-2">
            ← Kembali ke Dashboard
        </a>
        <h1 class="text-2xl font-bold text-gray-800">{{ $student->name }}</h1>
        <p class="text-sm text-gray-500">{{ $student->email }}</p>
    </div>
    
    <div class="bg-white p-4 rounded-xl shadow text-center min-w-[150px]">
        <div class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Avg. Mastery</div>
        <div class="text-3xl font-bold {{ $avgMastery < 50 ? 'text-red-600' : ($avgMastery < 75 ? 'text-amber-500' : 'text-green-600') }}">
            {{ round($avgMastery) }}<span class="text-lg">%</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold border-b pb-3 mb-4">Competency Map</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($competencies as $comp)
        <div class="border rounded-lg p-4 {{ $comp['mastery_level'] < 50 ? 'border-red-200 bg-red-50' : 'border-gray-200' }}">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-medium text-gray-800">{{ $comp['name'] }}</h3>
                <span class="font-bold {{ $comp['mastery_level'] < 50 ? 'text-red-600' : 'text-gray-700' }}">{{ $comp['mastery_level'] }}%</span>
            </div>
            
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-3">
                <div class="h-2.5 rounded-full {{ $comp['mastery_level'] < 50 ? 'bg-red-500' : ($comp['mastery_level'] < 75 ? 'bg-amber-400' : 'bg-green-500') }}" 
                     style="width: {{ $comp['mastery_level'] }}%"></div>
            </div>
            
            <div class="flex justify-between text-xs text-gray-500">
                <span>{{ $comp['assessment_count'] }}x Test</span>
                <span>{{ $comp['last_assessed_at'] ? \Carbon\Carbon::parse($comp['last_assessed_at'])->diffForHumans() : 'Belum pernah' }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
