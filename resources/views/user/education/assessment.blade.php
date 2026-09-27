@extends('user.layout')

@section('title', 'Assessment')

@section('content')
<div class="space-y-6">
    <div class="rounded-3xl border border-cyan-200 bg-gradient-to-r from-cyan-50 to-blue-50 p-6 shadow-sm">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-700">Assessment</p>
        <h1 class="mt-2 text-3xl font-black text-slate-900">Latihan Interaktif</h1>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Soal 1 dari {{ count($questions) }}</p>
                <p class="mt-1 text-xl font-bold text-slate-900">Perulangan & Looping</p>
            </div>
            <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">12:45</span>
        </div>

        @foreach($questions as $index => $question)
            <div class="rounded-xl bg-slate-50 p-5">
                <p class="text-lg font-bold text-slate-900">{{ $index + 1 }}. {{ $question['question'] }}</p>
                <div class="mt-4 grid gap-3 md:grid-cols-2">
                    @foreach($question['options'] as $option)
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white p-3">
                            <input type="radio" name="question-{{ $index + 1 }}" class="h-4 w-4 text-blue-600" />
                            <span class="text-sm font-medium text-slate-700">{{ $option }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="mt-6 flex justify-between gap-3">
            <button class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700">Sebelumnya</button>
            <button class="rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white">Berikutnya</button>
        </div>
    </div>
</div>
@endsection
