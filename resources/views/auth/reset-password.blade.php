<x-layouts.guest :title="__('Reset password')" :heading="__('Reset password')" :description="__('Please enter your new password below')">
    <form method="POST" action="{{ route('password.store') }}" class="flex flex-col gap-6">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="grid gap-2">
            <x-label for="email" :value="__('Email address')" />
            <x-input id="email" name="email" type="email" :value="old('email', $request->email)" :invalid="$errors->has('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="grid gap-2">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" name="password" type="password" :invalid="$errors->has('password')" required autofocus autocomplete="new-password" placeholder="{{ __('Password') }}" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="grid gap-2">
            <x-label for="password_confirmation" :value="__('Confirm password')" />
            <x-input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="{{ __('Confirm password') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <x-button class="w-full">{{ __('Reset password') }}</x-button>
    </form>
</x-layouts.guest>
