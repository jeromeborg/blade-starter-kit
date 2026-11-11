<x-layouts.guest :title="__('Confirm password')" :heading="__('Confirm your password')" :description="__('This is a secure area of the application. Please confirm your password before continuing.')">
    <form method="POST" action="{{ route('password.confirm') }}" class="flex flex-col gap-6">
        @csrf

        <div class="grid gap-2">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" name="password" type="password" :invalid="$errors->has('password')" required autofocus autocomplete="current-password" placeholder="{{ __('Password') }}" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <x-button class="w-full">{{ __('Confirm') }}</x-button>
    </form>
</x-layouts.guest>
