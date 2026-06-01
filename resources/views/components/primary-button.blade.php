<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-gold uppercase tracking-widest text-xs']) }}>
    {{ $slot }}
</button>
