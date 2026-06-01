@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full border-l-4 border-gym-gold bg-gym-card py-2 ps-3 pe-4 text-base font-medium text-gym-gold'
    : 'block w-full border-l-4 border-transparent py-2 ps-3 pe-4 text-base font-medium text-gym-muted transition hover:border-gym-border hover:bg-gym-card hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
