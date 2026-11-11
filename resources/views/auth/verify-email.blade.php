<x-layouts.guest :title="__('Verify email')" :heading="__('Verify your email address')" :description="__('Please verify your email address by clicking on the link we just emailed to you.')">
    @if ($status === 'verification-link-sent')
        <x-auth-session-status :status="__('A new verification link has been sent to the email address you provided during registration.')" />
    @endif

    <div class="flex flex-col items-center gap-4">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full">
            @csrf
            <x-button class="w-full">{{ __('Resend verification email') }}</x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-text-link as="button" type="submit" class="text-sm">{{ __('Log out') }}</x-text-link>
        </form>
    </div>
</x-layouts.guest>
