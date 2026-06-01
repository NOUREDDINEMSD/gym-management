<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gym-black font-sans text-white antialiased">
    <x-gym-nav />

    <main>
        {{ $slot }}
    </main>

    <footer class="border-t border-gym-border bg-gym-dark py-10">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-4 text-center text-sm text-gym-muted sm:flex-row sm:px-6 sm:text-left lg:px-8">
            <div>
                <p class="font-semibold text-white">{{ config('app.name') }}</p>
                <p class="mt-1">&copy; {{ date('Y') }} All rights reserved.</p>
            </div>
            <div class="flex gap-6">
                <a href="{{ route('offers') }}" class="transition hover:text-gym-gold">Offers</a>
                <a href="{{ route('home') }}#contact" class="transition hover:text-gym-gold">Contact</a>
                <a href="{{ route('login') }}" class="transition hover:text-gym-gold">Sign In</a>
            </div>
        </div>
    </footer>
</body>
</html>
