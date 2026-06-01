<nav class="border-b border-gym-border bg-gym-dark/90 backdrop-blur sticky top-0 z-50">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ url('/') }}" class="text-lg font-bold tracking-wide">
            <span class="text-gym-gold">GYM</span>
            <span class="text-white">FIT</span>
        </a>

        <div class="hidden items-center gap-8 text-sm font-medium md:flex">
            <a href="{{ route('offers') }}" class="text-gym-muted transition hover:text-gym-gold">Offers</a>
            <a href="{{ route('home') }}#why-us" class="text-gym-muted transition hover:text-gym-gold">Why Us</a>
            <a href="{{ route('home') }}#trainers" class="text-gym-muted transition hover:text-gym-gold">Trainers</a>
            <a href="{{ route('home') }}#contact" class="text-gym-muted transition hover:text-gym-gold">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-gold text-xs px-4 py-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gym-muted transition hover:text-white">Sign In</a>
                <a href="{{ route('register') }}" class="btn-gold text-xs px-4 py-2">Join Now</a>
            @endauth
        </div>
    </div>
</nav>
