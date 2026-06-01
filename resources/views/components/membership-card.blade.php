@props(['membership'])

<div @class([
    'gym-card relative flex flex-col',
    'border-gym-gold ring-1 ring-gym-gold/30' => $membership->is_popular,
])>
    @if ($membership->is_popular)
        <span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-gym-gold px-3 py-1 text-xs font-bold text-black">
            Popular
        </span>
    @endif

    <h3 class="text-xl font-bold text-white">{{ $membership->name }}</h3>

    <p class="mt-2 text-3xl font-bold text-gym-gold">
        ${{ number_format($membership->price, 0) }}
        <span class="text-base font-normal text-gym-muted">/mo</span>
    </p>

    <p class="mt-1 text-sm text-gym-muted">{{ $membership->duration_label }}</p>

    <ul class="mt-6 flex-1 space-y-3 text-sm text-gym-muted">
        @foreach ($membership->benefits as $benefit)
            <li class="flex items-start gap-2">
                <span class="text-gym-gold">✓</span>
                <span>{{ $benefit }}</span>
            </li>
        @endforeach
    </ul>

    <a
        href="{{ route('register', ['plan' => $membership->slug]) }}"
        @class([
            'mt-8 text-center',
            'btn-gold' => $membership->is_popular,
            'btn-outline' => ! $membership->is_popular,
        ])
    >
        Join {{ $membership->name }}
    </a>
</div>
