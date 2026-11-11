<x-layouts.app :title="__('Appearance settings')">
    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        @php
            $options = [
                'light' => ['label' => __('Light'), 'icon' => 'M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z'],
                'dark' => ['label' => __('Dark'), 'icon' => 'M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z'],
                'system' => ['label' => __('System'), 'icon' => 'M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25'],
            ];
        @endphp

        <div class="inline-flex gap-1 rounded-lg bg-zinc-200/60 p-1 dark:bg-zinc-800" role="group" aria-label="{{ __('Appearance') }}">
            @foreach ($options as $value => $option)
                <button
                    type="button"
                    class="flex items-center gap-2 rounded-md px-3.5 py-1.5 text-sm font-medium text-zinc-600 transition hover:text-zinc-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-zinc-400 aria-pressed:bg-white aria-pressed:text-zinc-900 aria-pressed:shadow-xs dark:text-zinc-400 dark:hover:text-zinc-100 dark:aria-pressed:bg-zinc-700 dark:aria-pressed:text-white"
                    data-appearance="{{ $value }}"
                    aria-pressed="false"
                >
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $option['icon'] }}" />
                    </svg>
                    {{ $option['label'] }}
                </button>
            @endforeach
        </div>

        <p class="mt-4 text-sm text-zinc-500 dark:text-zinc-400">
            {{ __('Your preference is stored in this browser and applied immediately.') }}
        </p>
    </x-settings.layout>
</x-layouts.app>
