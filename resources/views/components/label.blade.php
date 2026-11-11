@props(['value' => null])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-zinc-800 dark:text-zinc-200']) }}>
    {{ $value ?? $slot }}
</label>
