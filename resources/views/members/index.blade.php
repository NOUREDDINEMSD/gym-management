<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-xl font-bold text-white">Members</h2>
            <a href="{{ route('members.create') }}" class="btn-gold text-xs px-4 py-2">+ Register Member</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="rounded-lg border border-gym-gold/40 bg-gym-gold/10 px-4 py-3 text-sm text-gym-gold">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            <form method="GET" action="{{ route('members.index') }}" class="gym-card flex flex-col gap-4 sm:flex-row sm:items-end">
                <div class="flex-1">
                    <label for="q" class="block text-sm font-medium text-gym-muted">Search by ID or name</label>
                    <input
                        type="text"
                        id="q"
                        name="q"
                        value="{{ $search }}"
                        class="gym-input"
                        placeholder="e.g. GYM001 or Alex"
                    >
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn-gold">Search</button>
                    @if ($search)
                        <a href="{{ route('members.index') }}" class="btn-outline">Clear</a>
                    @endif
                </div>
            </form>

            @if ($search)
                <p class="text-sm text-gym-muted">
                    {{ $members->count() }} result(s) for &ldquo;{{ $search }}&rdquo;
                </p>
            @endif

            @if ($members->isEmpty())
                <div class="gym-card text-center">
                    <p class="text-gym-muted">No members found.</p>
                    <a href="{{ route('members.create') }}" class="btn-gold mt-4 inline-flex">Register first member</a>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($members as $member)
                        <x-member-card :member="$member" />
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
