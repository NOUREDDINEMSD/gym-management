<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gym-black font-sans text-white antialiased">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <a href="{{ url('/') }}" class="mb-8 text-2xl font-bold tracking-wide">
            <span class="text-gym-gold">GYM</span><span class="text-white">FIT</span>
        </a>

        <div class="w-full max-w-md rounded-2xl border border-gym-border bg-gym-card p-8 shadow-xl">
            {{ $slot }}
        </div>

        <a href="{{ url('/') }}" class="mt-6 text-sm text-gym-muted transition hover:text-gym-gold">
            &larr; Back to home
        </a>
    </div>
</body>
</html>
