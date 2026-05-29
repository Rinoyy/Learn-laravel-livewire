@props(['title' => null])

<div {{ $attributes->merge(['class' => 'corporate-panel overflow-hidden']) }}>
    @if ($title)
        <div class="border-b border-neutral-200 px-6 py-4">
            <h3 class="text-sm font-semibold text-neutral-900">{{ $title }}</h3>
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>
</div>
