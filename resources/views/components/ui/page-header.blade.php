@props(['title'])

<div {{ $attributes->merge(['class' => 'mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between']) }}>
    <h1 class="text-[20px] font-bold leading-tight text-neutral-900">
        {{ $title }}
    </h1>
    @if (isset($actions))
        <div class="flex shrink-0 items-center gap-2">
            {{ $actions }}
        </div>
    @endif
</div>
