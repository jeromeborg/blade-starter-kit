@props(['title' => null, 'heading' => null, 'description' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head', ['title' => $title])
    </head>
    <body class="min-h-screen font-sans">
        <div class="flex min-h-screen flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-6">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium">
                    <span class="flex size-9 items-center justify-center rounded-md bg-zinc-900 text-white dark:bg-white dark:text-zinc-900">
                        <x-app-logo-icon class="size-6" />
                    </span>
                    <span class="sr-only">{{ config('app.name') }}</span>
                </a>

                <div class="flex flex-col gap-6 rounded-xl border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900 sm:p-8">
                    @if ($heading || $description)
                        <div class="flex flex-col gap-1 text-center">
                            @if ($heading)
                                <h1 class="text-xl font-semibold tracking-tight">{{ $heading }}</h1>
                            @endif
                            @if ($description)
                                <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $description }}</p>
                            @endif
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
