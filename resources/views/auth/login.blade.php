<x-guest-layout>
    <h1 class="mb-6 text-center text-2xl font-bold text-white">Sign In</h1>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4 block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gym-border bg-gym-dark text-gym-gold focus:ring-gym-gold" name="remember">
                <span class="ms-2 text-sm text-gym-muted">Remember me</span>
            </label>
        </div>

        <div class="mt-6 flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm text-gym-muted transition hover:text-gym-gold" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif

            <x-primary-button>
                Log in
            </x-primary-button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm text-gym-muted">
        No account?
        <a href="{{ route('register') }}" class="font-medium text-gym-gold hover:text-amber-400">Register</a>
    </p>
</x-guest-layout>
