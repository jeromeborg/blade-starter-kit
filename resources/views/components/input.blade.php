@props(['invalid' => false])

@php
    $borderClasses = $invalid
        ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20 dark:border-red-500'
        : 'border-zinc-300 focus:border-zinc-500 focus:ring-zinc-500/20 dark:border-zinc-700 dark:focus:border-zinc-400';
@endphp

<input {{ $attributes->merge([
    'class' => 'block w-full rounded-lg border bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs placeholder:text-zinc-400 focus:outline-none focus:ring-2 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder:text-zinc-500 '.$borderClasses,
]) }} @if ($invalid) aria-invalid="true" @endif>
