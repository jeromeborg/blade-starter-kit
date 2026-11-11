@php
    $patternId = 'pattern-'.uniqid();
@endphp

<svg {{ $attributes->merge(['class' => 'absolute inset-0 size-full stroke-zinc-900/15 dark:stroke-zinc-100/15']) }} fill="none" aria-hidden="true">
    <defs>
        <pattern id="{{ $patternId }}" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
            <path d="M-3 13 15-5M-5 5l18-18M-1 21 17 3" />
        </pattern>
    </defs>
    <rect stroke="none" fill="url(#{{ $patternId }})" width="100%" height="100%" />
</svg>
