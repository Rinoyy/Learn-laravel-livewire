@props([
    'label' => null,
    'error' => null,
])

<div class="space-y-1">
    @if ($label)
        <label class="block text-sm font-medium text-neutral-700">
            {{ $label }}
        </label>
    @endif

    <select {{ $attributes->merge(['class' => 'corporate-select w-full']) }}>
        {{ $slot }}
    </select>

    @if ($error)
        <p class="text-xs text-red-500">{{ $error }}</p>
    @endif
</div>
