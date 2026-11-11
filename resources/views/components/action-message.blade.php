@props(['on'])

@if (session('status') === $on)
    <p {{ $attributes->merge(['class' => 'animate-fade-out text-sm font-medium text-zinc-600 dark:text-zinc-400']) }} role="status">
        {{ $slot->isEmpty() ? __('Saved.') : $slot }}
    </p>
@endif
