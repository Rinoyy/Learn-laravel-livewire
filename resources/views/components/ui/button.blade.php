@props([
    'type' => 'button',
    'variant' => 'primary',
    'href' => null,
    'size' => 'default',
])

@php
$base = 'inline-flex cursor-pointer items-center justify-center gap-2 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-blue-500 disabled:cursor-not-allowed disabled:opacity-50';
$sizes = [
    'default' => 'px-4 py-2',
    'sm'      => 'px-3 py-1.5 text-xs',
    'icon'    => 'p-2',
];
$variants = [
    'brand'       => 'btn-brand-gradient',
    'primary'     => 'bg-primary-600 text-white hover:bg-primary-700',
    'outline'     => 'border border-neutral-300 bg-white text-neutral-700 hover:border-neutral-400 hover:bg-neutral-50',
    'secondary'   => 'border border-neutral-200 bg-white text-neutral-700 hover:bg-neutral-50',
    'destructive' => 'border border-red-300 bg-white text-red-600 hover:bg-red-50',
    'danger'      => 'border border-red-300 bg-red-600 text-white hover:bg-red-700',
    'ghost'       => 'text-neutral-600 hover:bg-neutral-50 hover:text-blue-700',
];
$classes = $base . ' ' . ($sizes[$size] ?? $sizes['default']) . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
