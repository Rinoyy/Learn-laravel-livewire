@props(['type' => 'success'])

@php
$variants = [
    'success' => 'border border-emerald-300 bg-emerald-50 text-emerald-800',
    'error'   => 'border border-red-300 bg-red-50 text-red-800',
    'warning' => 'border border-amber-300 bg-amber-50 text-amber-800',
    'info'    => 'border border-blue-300 bg-blue-50 text-blue-800',
];
@endphp

<div {{ $attributes->merge(['class' => 'border px-4 py-3 text-sm ' . ($variants[$type] ?? $variants['info'])]) }}>
    {{ $slot }}
</div>
