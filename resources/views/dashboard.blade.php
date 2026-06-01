<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">Dashboard</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="gym-card">
                    <p class="text-sm text-gym-muted">Total Members</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $totalMembers }}</p>
                </div>
                <div class="gym-card">
                    <p class="text-sm text-gym-muted">Today Attendance</p>
                    <p class="mt-2 text-3xl font-bold text-gym-gold">{{ $todayAttendance }}</p>
                </div>
                <div class="gym-card">
                    <p class="text-sm text-gym-muted">Active Plans Used</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $activeMemberships }}</p>
                </div>
                <div class="gym-card">
                    <p class="text-sm text-gym-muted">Monthly Income</p>
                    <p class="mt-2 text-3xl font-bold text-gym-gold">${{ number_format($monthlyIncome, 0) }}</p>
                    <p class="mt-1 text-xs text-gym-muted">From current member plans</p>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                <div class="gym-card lg:col-span-2">
                    <h3 class="font-semibold text-white">Attendance — Last 7 Days</h3>
                    <p class="mt-1 text-sm text-gym-muted">Present check-ins per day</p>

                    <div class="mt-8 flex items-end justify-between gap-2 sm:gap-4" style="height: 200px;">
                        @foreach ($chartLabels as $index => $label)
                            @php
                                $value = $chartValues[$index];
                                $height = $maxChart > 0 ? ($value / $maxChart) * 100 : 0;
                            @endphp
                            <div class="flex flex-1 flex-col items-center gap-2">
                                <span class="text-xs font-medium text-gym-gold">{{ $value }}</span>
                                <div class="flex w-full max-w-[48px] flex-1 items-end">
                                    <div
                                        class="w-full rounded-t-lg bg-gradient-to-t from-gym-orange to-gym-gold transition-all"
                                        style="height: {{ max($height, 4) }}%;"
                                    ></div>
                                </div>
                                <span class="text-xs text-gym-muted">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="gym-card">
                    <h3 class="font-semibold text-white">Members by Plan</h3>
                    <p class="mt-1 text-sm text-gym-muted">Current breakdown</p>
                    <ul class="mt-6 space-y-4">
                        @foreach ($planBreakdown as $plan)
                            <li class="flex items-center justify-between text-sm">
                                <span class="text-gym-muted">{{ $plan->name }}</span>
                                <span class="font-semibold text-white">{{ $plan->member_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="gym-card">
                <h3 class="font-semibold text-white">Quick Actions</h3>
                <div class="mt-4 flex flex-wrap gap-4">
                    <a href="{{ route('members.create') }}" class="btn-gold">Register Member</a>
                    <a href="{{ route('members.index') }}" class="btn-outline">Search Members</a>
                    <a href="{{ route('attendance.index') }}" class="btn-outline">Attendance</a>
                    <a href="{{ route('offers') }}" class="btn-outline">View Offers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
