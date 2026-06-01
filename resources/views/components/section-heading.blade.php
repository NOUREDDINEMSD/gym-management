@props(['title', 'subtitle' => null])

<div class="mb-12 text-center">
    <h2 class="text-3xl font-bold text-white sm:text-4xl">{{ $title }}</h2>
    @if ($subtitle)
        <p class="mx-auto mt-4 max-w-2xl text-gym-muted">{{ $subtitle }}</p>
    @endif
    <div class="mx-auto mt-4 h-1 w-16 rounded-full bg-gym-gold"></div>
</div>
