<nav class="fixed inset-x-0 bottom-0 z-40 border-t border-slate-200 bg-white/95 px-2 py-2 backdrop-blur-sm lg:hidden">
    <div class="grid grid-cols-5 gap-1">
        @php
            $items = [
                ['label' => 'Beranda', 'icon' => 'home', 'href' => route('user.dashboard'), 'route' => 'user.dashboard'],
                ['label' => 'Intel', 'icon' => 'spark', 'href' => route('user.intelligence'), 'route' => 'user.intelligence'],
                ['label' => 'Rekom', 'icon' => 'star', 'href' => route('user.recommendations'), 'route' => 'user.recommendations'],
                ['label' => 'Aktivitas', 'icon' => 'activity', 'href' => route('user.activities'), 'route' => 'user.activities'],
                ['label' => 'Profil', 'icon' => 'user', 'href' => route('user.profile'), 'route' => 'user.profile'],
            ];
        @endphp

        @foreach($items as $item)
            <a href="{{ $item['href'] }}" class="flex flex-col items-center justify-center gap-1 rounded-xl px-2 py-2 text-[10px] font-medium {{ request()->routeIs($item['route']) ? 'bg-blue-50 text-blue-700' : 'text-slate-500' }}">
                <span class="flex h-5 w-5 items-center justify-center">
                    @switch($item['icon'])
                        @case('home')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V20h14V9.5"/><path d="M9 20v-7h6v7"/></svg>
                            @break
                        @case('spark')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="m12 2 2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2Z"/></svg>
                            @break
                        @case('star')
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path d="m12 2 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 2 6.6 18.8l1-6.1L3.2 8.4l6.1-.9L12 2Z"/></svg>
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
        @endforeach
    </div>
</nav>
