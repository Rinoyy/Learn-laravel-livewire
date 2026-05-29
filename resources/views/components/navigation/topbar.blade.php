@php
    $user = auth()->user();
    $initials = collect(explode(' ', $user->name))
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->take(2)
        ->join('');
@endphp

<header class="header-accent-bar sticky top-0 z-30 flex h-14 shrink-0 items-center justify-between border-b border-neutral-200 bg-white px-4 sm:px-6">
    <div class="flex items-center">
        <button type="button"
                class="inline-flex h-9 w-9 items-center justify-center border border-neutral-200 text-neutral-600 transition-colors hover:bg-neutral-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden"
                x-on:click="$dispatch('toggle-navigation')"
                aria-label="Buka navigasi">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center gap-3 sm:gap-4">
        <div class="flex items-center gap-2.5">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center bg-gradient-to-br from-blue-600 to-sky-500 text-xs font-bold text-white">
                {{ $initials }}
            </div>
            <span class="hidden max-w-[160px] truncate text-sm font-semibold text-neutral-800 sm:block">
                {{ $user->name }}
            </span>
        </div>

        <div class="hidden h-5 w-px bg-neutral-200 sm:block"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="border border-neutral-200 bg-white px-3 py-1.5 text-sm font-medium text-neutral-600 transition-colors hover:border-red-300 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                Logout
            </button>
        </form>
    </div>
</header>
