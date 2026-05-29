<div class="flex w-full flex-col items-center px-4">
    <div class="mb-6 text-center">
        <div class="mx-auto mb-3 flex h-11 w-11 items-center justify-center bg-gradient-to-br from-blue-600 to-sky-500 shadow-md shadow-blue-200">
            <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5.5A1.5 1.5 0 015.5 4h4A1.5 1.5 0 0111 5.5v4A1.5 1.5 0 019.5 11h-4A1.5 1.5 0 014 9.5v-4zM13 5.5A1.5 1.5 0 0114.5 4h4A1.5 1.5 0 0120 5.5v4a1.5 1.5 0 01-1.5 1.5h-4A1.5 1.5 0 0113 9.5v-4zM4 14.5A1.5 1.5 0 015.5 13h4a1.5 1.5 0 011.5 1.5v4A1.5 1.5 0 019.5 20h-4A1.5 1.5 0 014 18.5v-4zM13 14.5a1.5 1.5 0 011.5-1.5h4a1.5 1.5 0 011.5 1.5v4a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-4z"/>
            </svg>
        </div>
        <span class="text-base font-bold text-neutral-900">Learn Panel</span>
    </div>

    <div class="w-full max-w-[380px]">
        <div class="auth-card shadow-[0_4px_24px_rgba(0,0,0,0.06)]">
            <div class="mb-6">
                <h1 class="text-[18px] font-bold text-neutral-900">Masuk ke dashboard</h1>
                <p class="mt-1 text-sm text-neutral-500">Gunakan akun admin Learn Panel Anda</p>
            </div>

            @if ($errors->any())
                <x-ui.alert type="error" class="mb-5">{{ $errors->first() }}</x-ui.alert>
            @endif

            <form wire:submit="login" class="space-y-4">
                <x-ui.input
                    label="Email"
                    type="email"
                    wire:model="email"
                    autocomplete="email"
                    autofocus
                    :error="$errors->first('email')"
                />

                <x-ui.input
                    label="Password"
                    type="password"
                    revealable
                    wire:model="password"
                    autocomplete="current-password"
                    :error="$errors->first('password')"
                />

                <button type="submit"
                        wire:loading.attr="disabled"
                        class="btn-brand-gradient mt-1 inline-flex w-full items-center justify-center py-2.5 text-sm font-semibold disabled:opacity-60">
                    <span wire:loading.remove>Masuk</span>
                    <span wire:loading>Memproses...</span>
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-neutral-400">
            &copy; {{ date('Y') }} Learn Panel. Hak cipta dilindungi.
        </p>
    </div>
</div>
