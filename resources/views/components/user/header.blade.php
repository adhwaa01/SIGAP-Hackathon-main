@php
    $userName = Auth::check() ? Auth::user()->name : 'SIGAP User';
@endphp

<header class="border-b border-slate-200 bg-white/80 backdrop-blur-sm">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-400">Dashboard</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-900">{{ $pageTitle ?? 'Overview' }}</h1>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" class="relative rounded-xl border border-slate-200 bg-slate-50 p-2.5 text-slate-600 transition hover:bg-slate-100">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5">
                    <path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"/>
                    <path d="M10 20a2 2 0 0 0 4 0"/>
                </svg>
                <span class="absolute -right-1 -top-1 inline-flex h-4 min-w-4 items-center justify-center rounded-full bg-red-500 px-1 text-[9px] font-bold text-white">3</span>
            </button>

            <div class="hidden items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 sm:flex">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-violet-500 text-sm font-black text-white">
                    {{ strtoupper(substr($userName, 0, 2)) }}
                </div>
                <div class="text-right">
                    <div class="text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">Login</div>
                    <div class="text-sm font-semibold text-slate-700">{{ $userName }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-xl bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
