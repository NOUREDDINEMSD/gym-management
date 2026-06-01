<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $members = Member::with('membership')
            ->orderBy('name')
            ->get();

        $todayAttendance = Attendance::with(['member.membership'])
            ->whereDate('attendance_date', $today)
            ->orderByDesc('updated_at')
            ->get();

        return view('attendance.index', compact('members', 'todayAttendance', 'today'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'status' => ['required', 'in:present,absent'],
        ]);

        Attendance::updateOrCreate(
            [
                'member_id' => $validated['member_id'],
                'attendance_date' => now()->toDateString(),
            ],
            [
                'status' => $validated['status'],
            ]
        );

        return back()->with('success', 'Attendance saved.');
    }
}
