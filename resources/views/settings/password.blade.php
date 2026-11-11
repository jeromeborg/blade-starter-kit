<x-layouts.app :title="__('Password settings')">
    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            <div class="grid gap-2">
                <x-label for="current_password" :value="__('Current password')" />
                <x-input id="current_password" name="current_password" type="password" :invalid="$errors->updatePassword->has('current_password')" required autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" />
            </div>

            <div class="grid gap-2">
                <x-label for="password" :value="__('New password')" />
                <x-input id="password" name="password" type="password" :invalid="$errors->updatePassword->has('password')" required autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" />
            </div>

            <div class="grid gap-2">
                <x-label for="password_confirmation" :value="__('Confirm password')" />
                <x-input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>

            <div class="flex items-center gap-4">
                <x-button>{{ __('Save') }}</x-button>
                <x-action-message on="password-updated" />
            </div>
        </form>
    </x-settings.layout>
</x-layouts.app>
