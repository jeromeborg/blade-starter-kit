@props(['active' => false])

@php
    $classes = $active
        ? 'bg-zinc-200/60 text-zinc-900 dark:bg-zinc-800 dark:text-white'
        : 'text-zinc-600 hover:bg-zinc-200/60 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => 'whitespace-nowrap rounded-md px-3 py-2 text-sm font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-zinc-400 '.$classes]) }} @if ($active) aria-current="page" @endif>
    {{ $slot }}
</a>
