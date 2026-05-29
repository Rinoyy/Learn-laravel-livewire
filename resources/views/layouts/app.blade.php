<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'Dashboard') . ' - ' . config('app.name', 'Dashboard') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="app-shell-gradient antialiased overflow-hidden">

<div x-data="{ navigationOpen: false }"
     x-on:toggle-navigation.window="navigationOpen = ! navigationOpen"
     class="flex h-screen overflow-hidden">
    <div x-cloak
         x-show="navigationOpen"
         x-transition.opacity
         class="fixed inset-0 z-40 bg-neutral-900/40 md:hidden"
         x-on:click="navigationOpen = false"
         aria-hidden="true"></div>

    <x-navigation.sidebar
        class="fixed inset-y-0 left-0 z-50 -translate-x-full transform transition-transform duration-200 ease-out md:static md:z-auto md:translate-x-0"
        x-bind:class="{ 'translate-x-0': navigationOpen, '-translate-x-full': ! navigationOpen }"
        x-on:keydown.escape.window="navigationOpen = false"
        x-on:click="if ($event.target.closest('a')) navigationOpen = false"
    />

    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
        <x-navigation.topbar />

        <main class="flex-1 overflow-y-auto bg-[hsl(var(--background))] p-4 sm:p-6 lg:p-8">
            @if (session('success'))
                <x-ui.alert type="success" class="mb-4">{{ session('success') }}</x-ui.alert>
            @endif
            @if (session('error'))
                <x-ui.alert type="error" class="mb-4">{{ session('error') }}</x-ui.alert>
            @endif
            @if (session('warning'))
                <x-ui.alert type="warning" class="mb-4">{{ session('warning') }}</x-ui.alert>
            @endif

            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>