@props([
    'label' => null,
    'error' => null,
    'type'  => 'text',
    'revealable' => false,
])

@php
    $canReveal = $revealable && $type === 'password';
    $modelName = $attributes->wire('model')->value() ?: \Illuminate\Support\Str::slug($label ?? 'field');
    $inputId = $attributes->get('id', 'input-'.str_replace(['.', '_'], '-', $modelName));
    $inputClasses = 'corporate-input '.($canReveal ? 'pr-11 ' : '').($error ? 'border-red-400 focus:border-red-500 focus:ring-red-500' : '');
@endphp

<div class="flex flex-col gap-1.5" @if ($canReveal) x-data="{ passwordVisible: false }" @endif>
    @if ($label)
        <label for="{{ $inputId }}" class="text-sm font-medium text-neutral-700">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input id="{{ $inputId }}"
               type="{{ $type }}"
               @if ($canReveal) x-bind:type="passwordVisible ? 'text' : 'password'" @endif
               {{ $attributes->except('id')->merge(['class' => $inputClasses]) }} />

        @if ($canReveal)
            <button type="button"
                    class="absolute inset-y-0 right-0 inline-flex w-11 items-center justify-center text-neutral-400 transition-colors hover:text-blue-700 focus:outline-none focus:text-blue-700"
                    x-on:click="passwordVisible = ! passwordVisible"
                    x-bind:aria-label="passwordVisible ? 'Sembunyikan password' : 'Tampilkan password'"
                    aria-label="Tampilkan password"
                    x-bind:aria-pressed="passwordVisible.toString()">
                <svg x-show="! passwordVisible" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg x-cloak x-show="passwordVisible" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.641-4.362m3.165-2.08A9.957 9.957 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.03M3 3l18 18"/>
                </svg>
            </button>
        @endif
    </div>

    @if ($error)
        <p class="text-xs text-red-500">{{ $error }}</p>
    @endif
</div>
