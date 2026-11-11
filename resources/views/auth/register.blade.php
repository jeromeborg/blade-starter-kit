<x-layouts.guest :title="__('Register')" :heading="__('Create an account')" :description="__('Enter your details below to create your account')">
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6">
        @csrf

        <div class="grid gap-2">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" name="name" type="text" :value="old('name')" :invalid="$errors->has('name')" required autofocus autocomplete="name" placeholder="{{ __('Full name') }}" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="grid gap-2">
            <x-label for="email" :value="__('Email address')" />
            <x-input id="email" name="email" type="email" :value="old('email')" :invalid="$errors->has('email')" required autocomplete="email" placeholder="email@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="grid gap-2">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" name="password" type="password" :invalid="$errors->has('password')" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="grid gap-2">
            <x-label for="password_confirmation" :value="__('Confirm password')" />
            <x-input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="{{ __('Confirm password') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <x-button class="w-full">{{ __('Create account') }}</x-button>
    </form>

    <p class="text-center text-sm text-zinc-500 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <x-text-link href="{{ route('login') }}">{{ __('Log in') }}</x-text-link>
    </p>
</x-layouts.guest>
