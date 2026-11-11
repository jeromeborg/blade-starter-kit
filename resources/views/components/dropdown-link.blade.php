@props(['as' => 'a'])

@php
    $classes = 'flex w-full items-center gap-2 rounded-md px-3 py-2 text-left text-sm text-zinc-700 transition hover:bg-zinc-100 focus:outline-none focus-visible:bg-zinc-100 dark:text-zinc-200 dark:hover:bg-zinc-700 dark:focus-visible:bg-zinc-700';
@endphp

@if ($as === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }} role="menuitem">
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classes]) }} role="menuitem">
        {{ $slot }}
    </a>
@endif
