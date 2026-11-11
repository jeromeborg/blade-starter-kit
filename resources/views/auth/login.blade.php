<x-layouts.guest :title="__('Log in')" :heading="__('Log in to your account')" :description="__('Enter your email and password below to log in')">
    <x-auth-session-status :status="$status" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
        @csrf

        <div class="grid gap-2">
            <x-label for="email" :value="__('Email address')" />
            <x-input id="email" name="email" type="email" :value="old('email')" :invalid="$errors->has('email')" required autofocus autocomplete="email" placeholder="email@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="grid gap-2">
            <div class="flex items-center justify-between">
                <x-label for="password" :value="__('Password')" />
                @if ($canResetPassword)
                    <x-text-link href="{{ route('password.request') }}" class="text-sm">{{ __('Forgot your password?') }}</x-text-link>
                @endif
            </div>
            <x-input id="password" name="password" type="password" :invalid="$errors->has('password')" required autocomplete="current-password" placeholder="{{ __('Password') }}" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <label for="remember" class="flex items-center gap-2 text-sm text-zinc-700 dark:text-zinc-300">
            <x-checkbox id="remember" name="remember" :checked="old('remember')" />
            {{ __('Remember me') }}
        </label>

        <x-button class="w-full">{{ __('Log in') }}</x-button>
    </form>

    @if (Route::has('register'))
        <p class="text-center text-sm text-zinc-500 dark:text-zinc-400">
            {{ __("Don't have an account?") }}
            <x-text-link href="{{ route('register') }}">{{ __('Sign up') }}</x-text-link>
        </p>
    @endif
</x-layouts.guest>
