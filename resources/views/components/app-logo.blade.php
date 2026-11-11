<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    <span class="flex size-8 shrink-0 items-center justify-center rounded-md bg-zinc-900 text-white dark:bg-white dark:text-zinc-900">
        <x-app-logo-icon class="size-5" />
    </span>
    <span class="truncate text-sm font-semibold">{{ config('app.name') }}</span>
</div>
