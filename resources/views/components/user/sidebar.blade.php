@php
    $primaryItems = [
        ['label' => 'Beranda', 'href' => route('user.dashboard'), 'icon' => 'home', 'route' => 'user.dashboard'],
        ['label' => 'Intelligence', 'href' => route('user.intelligence'), 'icon' => 'spark', 'route' => 'user.intelligence'],
        ['label' => 'Rekomendasi', 'href' => route('user.recommendations'), 'icon' => 'star', 'route' => 'user.recommendations'],
        ['label' => 'Aktivitas', 'href' => route('user.activities'), 'icon' => 'activity', 'route' => 'user.activities'],
        ['label' => 'Profil', 'href' => route('user.profile'), 'icon' => 'user', 'route' => 'user.profile'],
    ];

    $moduleItems = [
        ['label' => 'Smart Education', 'href' => route('user.education'), 'route' => 'user.education', 'color' => 'bg-cyan-500'],
        ['label' => 'Smart City', 'href' => route('user.city'), 'route' => 'user.city', 'color' => 'bg-amber-500'],
        ['label' => 'AI Assistant', 'href' => route('user.intelligence'), 'route' => 'user.intelligence', 'color' => 'bg-violet-500'],
        ['label' => 'Pengaturan', 'href' => route('user.settings'), 'route' => 'user.settings', 'color' => 'bg-slate-500'],
    ];
@endphp

<aside class="hidden w-72 flex-shrink-0 bg-[#0B132B] text-white lg:flex lg:flex-col">
    <div class="border-b border-white/10 px-6 py-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 text-lg font-black text-white shadow-lg shadow-blue-900/30">
                S
            </div>
            <div>
                <div class="text-2xl font-black tracking-tight">
                    SIGAP<span class="text-blue-400">User</span>
                </div>
                <p class="mt-1 text-[10px] font-semibold uppercase tracking-[0.24em] text-slate-300">
                    Universal Access
                </p>
            </div>
        </div>
    </div>

    <nav class="flex-1 space-y-6 px-4 py-5">
        <div>
            <p class="px-3 text-[10px] font-semibold uppercase tracking-[0.22em] text-slate-400">Core SIGAP</p>
            <ul class="mt-3 space-y-1">
                @foreach($primaryItems as $item)
                    <li>
                        <a href="{{ $item['href'] }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-200 transition hover:bg-white/5 hover:text-white {{ request()->routeIs($item['route']) ? 'bg-blue-500/15 text-white' : '' }}">
                            <span class="flex h-5 w-5 items-center justify-center text-[11px]">
                                @switch($item['icon'])
                                    @case('home')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V20h14V9.5"/><path d="M9 20v-7h6v7"/></svg>
                                        @break
                                    @case('spark')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="m12 2 2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2Z"/></svg>
                                        @break
                                    @case('star')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="m12 2 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 0 6.6 18.8l1-6.1L3.2 8.4l6.1-.9L12 2Z"/></svg>
                                        @break
                                    @case('activity')
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="M3 12h4l2-6 4 12 2-6h6"/></svg>
                                        @break
                                    @default
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/><path d="M4 20a8 8 0 0 1 16 0"/></svg>
                                @endswitch
                            </span>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <p class="px-3 text-[10px] font-semibold uppercase tracking-[0.22em] text-slate-400">Modul</p>
            <ul class="mt-3 space-y-1">
                @foreach($moduleItems as $module)
                    <li>
                        <a href="{{ $module['href'] }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-200 transition hover:bg-white/5 hover:text-white {{ request()->routeIs($module['route']) ? 'bg-white/5 text-white' : '' }}">
                            <span class="inline-flex h-2.5 w-2.5 rounded-full {{ $module['color'] ?? 'bg-blue-400' }}"></span>
                            {{ $module['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</aside>
