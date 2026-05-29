@php
    $user = auth()->user();
    $initials = collect(explode(' ', $user->name))
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->take(2)
        ->join('');
@endphp

<aside {{ $attributes->merge(['class' => 'flex h-screen w-64 shrink-0 flex-col border-r border-neutral-200 bg-white md:min-h-screen']) }}>
    <div class="flex items-center gap-2.5 border-b border-neutral-200 px-5 py-[14px]">
        <div class="flex h-7 w-7 items-center justify-center bg-gradient-to-br from-blue-600 to-sky-500">
            <svg class="h-3.5 w-3.5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5.5A1.5 1.5 0 015.5 4h4A1.5 1.5 0 0111 5.5v4A1.5 1.5 0 019.5 11h-4A1.5 1.5 0 014 9.5v-4zM13 5.5A1.5 1.5 0 0114.5 4h4A1.5 1.5 0 0120 5.5v4a1.5 1.5 0 01-1.5 1.5h-4A1.5 1.5 0 0113 9.5v-4zM4 14.5A1.5 1.5 0 015.5 13h4a1.5 1.5 0 011.5 1.5v4A1.5 1.5 0 019.5 20h-4A1.5 1.5 0 014 18.5v-4zM13 14.5a1.5 1.5 0 011.5-1.5h4a1.5 1.5 0 011.5 1.5v4a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-4z"/>
            </svg>
        </div>
        <span class="text-[14px] font-bold text-neutral-900">Learn Panel</span>
    </div>

    <nav class="flex-1 overflow-y-auto py-3">
        <div class="mb-5">
            <p class="mb-1.5 px-5 text-[10.5px] font-semibold uppercase tracking-[0.07em] text-neutral-500">Workspace</p>
            <a href="{{ route('dashboard') }}"
               wire:navigate
               class="flex items-center gap-2.5 px-5 py-2 text-[13px] transition-colors
                      {{ request()->routeIs('dashboard')
                          ? 'sidebar-active-item'
                          : 'font-medium text-neutral-700 hover:bg-neutral-100/60 hover:text-neutral-900' }}">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('products.index') }}"
               wire:navigate
               class="flex items-center gap-2.5 px-5 py-2 text-[13px] transition-colors
                      {{ request()->routeIs('products.*')
                          ? 'sidebar-active-item'
                          : 'font-medium text-neutral-700 hover:bg-neutral-100/60 hover:text-neutral-900' }}">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Products
            </a>
        </div>

    </nav>

    <div class="border-t border-neutral-200 bg-neutral-50/80 px-4 py-3.5">
        <div class="quota-gradient-bar mb-3"></div>
        <p class="mb-1.5 text-[10px] font-semibold uppercase tracking-[0.07em] text-blue-700">Admin</p>
        <div class="flex items-center gap-2.5">
            <div class="flex h-7 w-7 shrink-0 items-center justify-center bg-gradient-to-br from-blue-600 to-sky-500 text-[11px] font-bold text-white">
                {{ $initials }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="truncate text-[13px] font-semibold text-neutral-900">{{ $user->name }}</p>
                <p class="truncate text-[11px] text-neutral-500">{{ $user->email }}</p>
            </div>
        </div>
    </div>
</aside>
