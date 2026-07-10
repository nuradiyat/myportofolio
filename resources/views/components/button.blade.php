@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
])

@php

    $base = 'inline-flex items-center justify-center rounded-xl font-semibold transition-all duration-300';

    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-slate-900 hover:bg-slate-800 text-white',
        'outline' => 'border border-slate-300 hover:border-blue-600 hover:text-blue-600',
        'ghost' => 'hover:bg-slate-100',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3',
        'lg' => 'px-8 py-4 text-lg',
    ];

    $class = "{$base} {$variants[$variant]} {$sizes[$size]}";

@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
