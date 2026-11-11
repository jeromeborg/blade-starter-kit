@props(['active' => false, 'as' => 'a'])

@php
    $classes = $active
        ? 'bg-zinc-100 text-zinc-900 dark:bg-zinc-800 dark:text-white'
        : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white';

    $base = 'block w-full rounded-md px-3 py-2 text-left text-base font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-zinc-400 ';
@endphp

@if ($as === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => $base.$classes]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $base.$classes]) }} @if ($active) aria-current="page" @endif>
        {{ $slot }}
    </a>
@endif
