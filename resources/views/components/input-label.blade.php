@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gym-muted']) }}>
    {{ $value ?? $slot }}
</label>
