<x-layouts.app :title="__('Dashboard')">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight">{{ __('Dashboard') }}</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    {{ __('Welcome back, :name.', ['name' => auth()->user()->name]) }}
                </p>
            </div>

            @if (request()->boolean('verified'))
                <x-auth-session-status :status="__('Your email address has been verified.')" />
            @endif
        </div>

        <div class="flex flex-col gap-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                @for ($i = 0; $i < 3; $i++)
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-900">
                        <x-placeholder-pattern />
                    </div>
                @endfor
            </div>

            <div class="relative min-h-[50vh] flex-1 overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-800 dark:bg-zinc-900">
                <x-placeholder-pattern />
            </div>
        </div>
    </div>
</x-layouts.app>
