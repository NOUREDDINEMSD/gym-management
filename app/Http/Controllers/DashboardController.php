<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();

        $todayAttendance = Attendance::whereDate('attendance_date', today())
            ->where('status', 'present')
            ->count();

        $activeMemberships = Member::distinct()->count('membership_id');

        $monthlyIncome = Member::query()
            ->join('memberships', 'members.membership_id', '=', 'memberships.id')
            ->sum('memberships.price');

        $chartLabels = [];
        $chartValues = [];
        $maxChart = 1;

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = Attendance::whereDate('attendance_date', $date)
                ->where('status', 'present')
                ->count();

            $chartLabels[] = $date->format('D');
            $chartValues[] = $count;
            $maxChart = max($maxChart, $count);
        }

        $planBreakdown = Membership::query()
            ->leftJoin('members', 'memberships.id', '=', 'members.membership_id')
            ->select('memberships.name', DB::raw('count(members.id) as member_count'))
            ->groupBy('memberships.id', 'memberships.name')
            ->orderByDesc('member_count')
            ->get();

        return view('dashboard', compact(
            'totalMembers',
            'todayAttendance',
            'activeMemberships',
            'monthlyIncome',
            'chartLabels',
            'chartValues',
            'maxChart',
            'planBreakdown',
        ));
    }
}
