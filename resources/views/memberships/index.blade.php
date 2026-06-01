<x-site-layout>
    <section class="border-b border-gym-border bg-gym-dark py-16">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-widest text-gym-gold">Memberships</p>
            <h1 class="mt-3 text-4xl font-bold text-white sm:text-5xl">Choose Your Plan</h1>
            <p class="mx-auto mt-4 max-w-2xl text-gym-muted">
                Flexible options for every goal. All plans include full gym access during your membership period.
            </p>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if ($memberships->isEmpty())
                <p class="text-center text-gym-muted">No membership plans available right now.</p>
            @else
                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($memberships as $membership)
                        <x-membership-card :membership="$membership" />
                    @endforeach
                </div>
            @endif

            <p class="mt-12 text-center text-sm text-gym-muted">
                Not sure which plan fits?
                <a href="{{ route('home') }}#contact" class="font-medium text-gym-gold hover:text-amber-400">Contact us</a>
                and we will help you decide.
            </p>
        </div>
    </section>
</x-site-layout>
