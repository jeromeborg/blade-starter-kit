@props(['align' => 'right', 'width' => 'w-56'])

@php
    $alignmentClasses = match ($align) {
        'left' => 'origin-top-left start-0',
        'top' => 'origin-top',
        default => 'origin-top-right end-0',
    };
@endphp

<div class="relative" data-dropdown>
    {{ $trigger }}

    <div
        class="absolute z-50 mt-2 {{ $width }} {{ $alignmentClasses }} rounded-lg border border-zinc-200 bg-white p-1 shadow-lg dark:border-zinc-700 dark:bg-zinc-800"
        role="menu"
        data-dropdown-menu
        hidden
    >
        {{ $content }}
    </div>
</div>
