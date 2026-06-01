<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-bold text-white">Attendance</h2>
                <p class="text-sm text-gym-muted">Today: {{ \Carbon\Carbon::parse($today)->format('M d, Y') }}</p>
            </div>
            <a href="{{ route('members.create') }}" class="btn-outline text-xs px-4 py-2">+ Register Member</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="rounded-lg border border-gym-gold/40 bg-gym-gold/10 px-4 py-3 text-sm text-gym-gold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="gym-card overflow-hidden p-0">
                <div class="border-b border-gym-border px-6 py-4">
                    <h3 class="font-semibold text-white">Mark Attendance</h3>
                    <p class="mt-1 text-sm text-gym-muted">Select present or absent for each member.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-gym-border bg-gym-dark text-gym-muted">
                            <tr>
                                <th class="px-6 py-3 font-medium">Member</th>
                                <th class="px-6 py-3 font-medium">ID</th>
                                <th class="px-6 py-3 font-medium">Membership</th>
                                <th class="px-6 py-3 font-medium text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gym-border">
                            @forelse ($members as $member)
                                @php
                                    $record = $todayAttendance->firstWhere('member_id', $member->id);
                                @endphp
                                <tr class="hover:bg-gym-dark/50">
                                    <td class="px-6 py-4 font-medium text-white">{{ $member->name }}</td>
                                    <td class="px-6 py-4 text-gym-muted">{{ $member->member_code }}</td>
                                    <td class="px-6 py-4">
                                        <span class="rounded-full bg-gym-gold/10 px-2 py-1 text-xs text-gym-gold">
                                            {{ $member->membership->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end gap-2">
                                            <form method="POST" action="{{ route('attendance.store') }}">
                                                @csrf
                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <input type="hidden" name="status" value="present">
                                                <button type="submit" @class([
                                                    'rounded-lg px-3 py-1.5 text-xs font-semibold transition',
                                                    'bg-green-500/20 text-green-400 ring-1 ring-green-500/50' => $record?->status === 'present',
                                                    'bg-gym-dark text-gym-muted hover:bg-green-500/20 hover:text-green-400' => $record?->status !== 'present',
                                                ])>
                                                    Present
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('attendance.store') }}">
                                                @csrf
                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <input type="hidden" name="status" value="absent">
                                                <button type="submit" @class([
                                                    'rounded-lg px-3 py-1.5 text-xs font-semibold transition',
                                                    'bg-red-500/20 text-red-400 ring-1 ring-red-500/50' => $record?->status === 'absent',
                                                    'bg-gym-dark text-gym-muted hover:bg-red-500/20 hover:text-red-400' => $record?->status !== 'absent',
                                                ])>
                                                    Absent
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gym-muted">
                                        No members yet. Run the member seeder first.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="gym-card overflow-hidden p-0">
                <div class="border-b border-gym-border px-6 py-4">
                    <h3 class="font-semibold text-white">Today&apos;s Attendance</h3>
                    <p class="mt-1 text-sm text-gym-muted">{{ $todayAttendance->count() }} record(s) logged</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-gym-border bg-gym-dark text-gym-muted">
                            <tr>
                                <th class="px-6 py-3 font-medium">Member</th>
                                <th class="px-6 py-3 font-medium">Membership</th>
                                <th class="px-6 py-3 font-medium">Date</th>
                                <th class="px-6 py-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gym-border">
                            @forelse ($todayAttendance as $row)
                                <tr>
                                    <td class="px-6 py-4 font-medium text-white">{{ $row->member->name }}</td>
                                    <td class="px-6 py-4 text-gym-muted">{{ $row->member->membership->name }}</td>
                                    <td class="px-6 py-4 text-gym-muted">{{ $row->attendance_date->format('M d, Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if ($row->status === 'present')
                                            <span class="rounded-full bg-green-500/20 px-2 py-1 text-xs font-medium text-green-400">Present</span>
                                        @else
                                            <span class="rounded-full bg-red-500/20 px-2 py-1 text-xs font-medium text-red-400">Absent</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gym-muted">
                                        No attendance marked for today yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
