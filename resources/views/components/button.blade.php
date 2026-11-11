@props(['variant' => 'primary', 'as' => 'button'])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-white disabled:cursor-not-allowed disabled:opacity-60 dark:focus-visible:ring-offset-zinc-900';

    $variants = [
        'primary' => 'bg-zinc-900 text-white hover:bg-zinc-700 focus-visible:ring-zinc-500 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200',
        'secondary' => 'border border-zinc-300 bg-white text-zinc-800 hover:bg-zinc-50 focus-visible:ring-zinc-400 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:bg-zinc-800',
        'danger' => 'bg-red-600 text-white hover:bg-red-500 focus-visible:ring-red-500',
        'ghost' => 'text-zinc-700 hover:bg-zinc-100 focus-visible:ring-zinc-400 dark:text-zinc-200 dark:hover:bg-zinc-800',
    ];

    $classes = $base.' '.($variants[$variant] ?? $variants['primary']);
@endphp

@if ($as === 'a')
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
