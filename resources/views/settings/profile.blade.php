<x-layouts.app :title="__('Profile settings')">
    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form method="POST" action="{{ route('profile.update') }}" class="flex flex-col gap-6">
            @csrf
            @method('PATCH')

            <div class="grid gap-2">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" name="name" type="text" :value="old('name', $user->name)" :invalid="$errors->has('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="grid gap-2">
                <x-label for="email" :value="__('Email address')" />
                <x-input id="email" name="email" type="email" :value="old('email', $user->email)" :invalid="$errors->has('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" />

                @if ($mustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-sm text-amber-800 dark:border-amber-900 dark:bg-amber-950 dark:text-amber-200">
                        <p>
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="font-medium underline underline-offset-4 hover:no-underline">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if ($status === 'verification-link-sent')
                            <p class="mt-2 font-medium text-green-700 dark:text-green-300">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <x-button>{{ __('Save') }}</x-button>
                <x-action-message on="profile-updated" />
            </div>
        </form>

        <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <div class="mt-10 border-t border-zinc-200 pt-8 dark:border-zinc-800">
            <h3 class="text-base font-semibold">{{ __('Delete account') }}</h3>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                {{ __('Delete your account and all of its resources') }}
            </p>

            <x-button variant="danger" type="button" class="mt-4" data-dialog-open="#confirm-user-deletion">
                {{ __('Delete account') }}
            </x-button>
        </div>

        <dialog
            id="confirm-user-deletion"
            class="m-auto w-full max-w-lg rounded-xl border border-zinc-200 bg-white p-0 text-zinc-900 shadow-xl backdrop:bg-zinc-900/50 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-100"
            data-open="{{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }}"
        >
            <form method="POST" action="{{ route('profile.destroy') }}" class="flex flex-col gap-6 p-6">
                @csrf
                @method('DELETE')

                <div class="space-y-2">
                    <h2 class="text-lg font-semibold">{{ __('Are you sure you want to delete your account?') }}</h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                </div>

                <div class="grid gap-2">
                    <x-label for="delete_password" :value="__('Password')" />
                    <x-input id="delete_password" name="password" type="password" :invalid="$errors->userDeletion->has('password')" autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" />
                </div>

                <div class="flex justify-end gap-3">
                    <x-button variant="secondary" type="button" data-dialog-close>{{ __('Cancel') }}</x-button>
                    <x-button variant="danger">{{ __('Delete account') }}</x-button>
                </div>
            </form>
        </dialog>
    </x-settings.layout>
</x-layouts.app>
