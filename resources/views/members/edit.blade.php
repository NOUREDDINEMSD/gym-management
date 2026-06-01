<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-xl font-bold text-white">Edit Member</h2>
            <a href="{{ route('members.index') }}" class="text-sm text-gym-muted transition hover:text-gym-gold">&larr; Back to members</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-xl space-y-6 px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('members.update', $member) }}" enctype="multipart/form-data" class="gym-card space-y-5">
                @csrf
                @method('PUT')

                <div class="rounded-lg border border-gym-border bg-gym-dark px-4 py-3 text-sm">
                    <span class="text-gym-muted">Member ID:</span>
                    <span class="ms-2 font-semibold text-gym-gold">{{ $member->member_code }}</span>
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gym-muted">Full name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" required class="gym-input">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gym-muted">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" class="gym-input">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <label for="membership_id" class="block text-sm font-medium text-gym-muted">Membership plan</label>
                    <select id="membership_id" name="membership_id" required class="gym-input">
                        @foreach ($memberships as $plan)
                            <option value="{{ $plan->id }}" @selected(old('membership_id', $member->membership_id) == $plan->id)>
                                {{ $plan->name }} — ${{ number_format($plan->price, 0) }}/mo
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('membership_id')" class="mt-2" />
                </div>

                <div>
                    <label for="joined_at" class="block text-sm font-medium text-gym-muted">Join date</label>
                    <input type="date" id="joined_at" name="joined_at" value="{{ old('joined_at', $member->joined_at->toDateString()) }}" required class="gym-input">
                    <x-input-error :messages="$errors->get('joined_at')" class="mt-2" />
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gym-muted">Photo</label>
                    @if ($member->photo)
                        <div class="mb-3 flex items-center gap-4">
                            <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class="h-16 w-16 rounded-full object-cover ring-2 ring-gym-border">
                            <label class="inline-flex items-center gap-2 text-sm text-gym-muted">
                                <input type="checkbox" name="remove_photo" value="1" class="rounded border-gym-border bg-gym-dark text-gym-gold focus:ring-gym-gold">
                                Remove photo
                            </label>
                        </div>
                    @endif
                    <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 block w-full text-sm text-gym-muted file:mr-4 file:rounded-lg file:border-0 file:bg-gym-gold file:px-4 file:py-2 file:text-sm file:font-semibold file:text-black hover:file:bg-amber-400">
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" class="btn-gold">Save Changes</button>
                    <a href="{{ route('members.index') }}" class="btn-outline">Cancel</a>
                </div>
            </form>

            <form
                method="POST"
                action="{{ route('members.destroy', $member) }}"
                class="gym-card border-red-500/30"
                onsubmit="return confirm('Delete {{ $member->name }}? This also removes their attendance history.');"
            >
                @csrf
                @method('DELETE')
                <h3 class="font-semibold text-red-400">Delete member</h3>
                <p class="mt-2 text-sm text-gym-muted">This action cannot be undone.</p>
                <button type="submit" class="mt-4 rounded-lg border border-red-500/50 px-4 py-2 text-sm font-semibold text-red-400 transition hover:bg-red-500/10">
                    Delete {{ $member->name }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
