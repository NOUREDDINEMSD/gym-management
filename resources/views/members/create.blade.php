<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-xl font-bold text-white">Register Member</h2>
            <a href="{{ route('members.index') }}" class="text-sm text-gym-muted transition hover:text-gym-gold">&larr; Back to members</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data" class="gym-card space-y-5">
                @csrf

                <div class="rounded-lg border border-gym-border bg-gym-dark px-4 py-3 text-sm">
                    <span class="text-gym-muted">Member ID (auto):</span>
                    <span class="ms-2 font-semibold text-gym-gold">{{ $nextCode }}</span>
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gym-muted">Full name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="gym-input" placeholder="John Doe">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gym-muted">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="gym-input" placeholder="555-0000">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <label for="membership_id" class="block text-sm font-medium text-gym-muted">Membership plan</label>
                    <select id="membership_id" name="membership_id" required class="gym-input">
                        <option value="">Select a plan</option>
                        @foreach ($memberships as $plan)
                            <option value="{{ $plan->id }}" @selected(old('membership_id') == $plan->id)>
                                {{ $plan->name }} — ${{ number_format($plan->price, 0) }}/mo
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('membership_id')" class="mt-2" />
                </div>

                <div>
                    <label for="joined_at" class="block text-sm font-medium text-gym-muted">Join date</label>
                    <input type="date" id="joined_at" name="joined_at" value="{{ old('joined_at', now()->toDateString()) }}" required class="gym-input">
                    <x-input-error :messages="$errors->get('joined_at')" class="mt-2" />
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gym-muted">Photo (optional)</label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 block w-full text-sm text-gym-muted file:mr-4 file:rounded-lg file:border-0 file:bg-gym-gold file:px-4 file:py-2 file:text-sm file:font-semibold file:text-black hover:file:bg-amber-400">
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <button type="submit" class="btn-gold w-full sm:w-auto">Save Member</button>
            </form>
        </div>
    </div>
</x-app-layout>
