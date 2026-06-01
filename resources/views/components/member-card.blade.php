@props(['member'])

@php
    $rate = $member->total_attendance > 0
        ? (int) round(($member->present_count / $member->total_attendance) * 100)
        : 0;
@endphp

<div class="gym-card">
    <div class="flex items-start gap-4">
        @if ($member->photo)
            <img
                src="{{ asset('storage/'.$member->photo) }}"
                alt="{{ $member->name }}"
                class="h-16 w-16 rounded-full object-cover ring-2 ring-gym-border"
            >
        @else
            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gym-gold/10 text-lg font-bold text-gym-gold">
                {{ strtoupper(substr($member->name, 0, 2)) }}
            </div>
        @endif

        <div class="min-w-0 flex-1">
            <h3 class="truncate text-lg font-bold text-white">{{ $member->name }}</h3>
            <p class="text-sm text-gym-gold">{{ $member->member_code }}</p>
        </div>
    </div>

    <dl class="mt-5 space-y-3 text-sm">
        <div class="flex justify-between gap-4">
            <dt class="text-gym-muted">Phone</dt>
            <dd class="text-white">{{ $member->phone ?? '—' }}</dd>
        </div>
        <div class="flex justify-between gap-4">
            <dt class="text-gym-muted">Membership</dt>
            <dd>
                <span class="rounded-full bg-gym-gold/10 px-2 py-1 text-xs text-gym-gold">
                    {{ $member->membership->name }}
                </span>
            </dd>
        </div>
        <div class="flex justify-between gap-4">
            <dt class="text-gym-muted">Join date</dt>
            <dd class="text-white">{{ $member->joined_at->format('M d, Y') }}</dd>
        </div>
        <div class="flex justify-between gap-4">
            <dt class="text-gym-muted">Attendance</dt>
            <dd class="text-right text-white">
                <span class="text-green-400">{{ $member->present_count }} present</span>
                <span class="text-gym-muted"> · </span>
                <span class="text-red-400">{{ $member->absent_count }} absent</span>
            </dd>
        </div>
        <div class="flex justify-between gap-4">
            <dt class="text-gym-muted">Attendance rate</dt>
            <dd class="font-semibold text-gym-gold">{{ $rate }}%</dd>
        </div>
    </dl>

    <div class="mt-5 flex gap-2 border-t border-gym-border pt-4">
        <a href="{{ route('members.edit', $member) }}" class="btn-outline flex-1 text-center text-xs py-2">Edit</a>
        <a href="{{ route('attendance.index') }}" class="rounded-lg border border-gym-border px-3 py-2 text-xs text-gym-muted transition hover:border-gym-gold hover:text-gym-gold">
            Attendance
        </a>
    </div>
</div>
