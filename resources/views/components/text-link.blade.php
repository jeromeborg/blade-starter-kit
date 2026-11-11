@props(['as' => 'a'])

@php
    $classes = 'rounded-sm font-medium text-zinc-900 underline decoration-zinc-400 underline-offset-4 transition hover:decoration-zinc-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-zinc-400 dark:text-zinc-100 dark:decoration-zinc-600 dark:hover:decoration-zinc-100';
@endphp

@if ($as === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
