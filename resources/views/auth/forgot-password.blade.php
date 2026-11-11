<x-layouts.guest :title="__('Forgot password')" :heading="__('Forgot password')" :description="__('Enter your email to receive a password reset link')">
    <x-auth-session-status :status="$status" />

    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
        @csrf

        <div class="grid gap-2">
            <x-label for="email" :value="__('Email address')" />
            <x-input id="email" name="email" type="email" :value="old('email')" :invalid="$errors->has('email')" required autofocus autocomplete="email" placeholder="email@example.com" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <x-button class="w-full">{{ __('Email password reset link') }}</x-button>
    </form>

    <p class="text-center text-sm text-zinc-500 dark:text-zinc-400">
        {{ __('Or, return to') }}
        <x-text-link href="{{ route('login') }}">{{ __('log in') }}</x-text-link>
    </p>
</x-layouts.guest>
