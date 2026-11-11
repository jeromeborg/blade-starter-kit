@props(['user'])

<span {{ $attributes->merge(['class' => 'flex size-8 shrink-0 items-center justify-center rounded-full bg-zinc-200 text-xs font-semibold text-zinc-700 dark:bg-zinc-700 dark:text-zinc-100']) }} aria-hidden="true">
    {{ $user->initials() }}
</span>
