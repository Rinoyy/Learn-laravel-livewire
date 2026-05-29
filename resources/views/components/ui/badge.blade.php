@props(['type' => 'default'])

@php
$variants = [
    'success'    => 'border border-emerald-400 bg-emerald-50 font-bold text-emerald-700',
    'completed'  => 'border border-emerald-400 bg-emerald-50 font-bold text-emerald-700',
    'pending'    => 'border border-amber-400 bg-amber-50 font-bold text-amber-700',
    'processing' => 'border border-blue-400 bg-blue-50 font-bold text-blue-700',
    'failed'     => 'border border-red-400 bg-red-50 font-bold text-red-700',
    'danger'     => 'border border-red-400 bg-red-50 font-bold text-red-700',
    'inactive'   => 'border border-neutral-300 bg-neutral-100 font-bold text-neutral-600',
    'default'    => 'border border-neutral-300 bg-neutral-100 font-bold text-neutral-600',
];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-0.5 text-[11px] uppercase tracking-wide ' . ($variants[$type] ?? $variants['default'])]) }}>
    {{ $slot }}
</span>
