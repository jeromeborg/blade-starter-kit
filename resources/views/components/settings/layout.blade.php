@props(['heading', 'subheading' => null])

<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold tracking-tight">{{ __('Settings') }}</h1>
        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Manage your profile and account settings') }}</p>
    </div>

    <div class="flex flex-col gap-8 lg:flex-row lg:gap-12">
        <aside class="w-full lg:w-56 lg:shrink-0">
            <nav class="flex gap-1 overflow-x-auto lg:flex-col" aria-label="{{ __('Settings') }}">
                <x-settings.nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </x-settings.nav-link>
                <x-settings.nav-link :href="route('password.edit')" :active="request()->routeIs('password.edit')">
                    {{ __('Password') }}
                </x-settings.nav-link>
                <x-settings.nav-link :href="route('appearance.edit')" :active="request()->routeIs('appearance.edit')">
                    {{ __('Appearance') }}
                </x-settings.nav-link>
            </nav>
        </aside>

        <div class="min-w-0 flex-1 lg:max-w-2xl">
            <div class="mb-6">
                <h2 class="text-lg font-semibold">{{ $heading }}</h2>
                @if ($subheading)
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ $subheading }}</p>
                @endif
            </div>

            {{ $slot }}
        </div>
    </div>
</div>
