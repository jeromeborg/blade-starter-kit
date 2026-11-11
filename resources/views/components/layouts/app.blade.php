@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head', ['title' => $title])
    </head>
    <body class="min-h-screen font-sans">
        <div class="flex min-h-screen flex-col">
            <x-navigation />

            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
