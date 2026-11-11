@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-center text-sm font-medium text-green-700 dark:border-green-900 dark:bg-green-950 dark:text-green-300']) }} role="status">
        {{ $status }}
    </div>
@endif
