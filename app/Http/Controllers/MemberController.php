<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('q', ''));

        $query = Member::with('membership')
            ->withCount([
                'attendances as present_count' => fn ($q) => $q->where('status', 'present'),
                'attendances as absent_count' => fn ($q) => $q->where('status', 'absent'),
                'attendances as total_attendance',
            ]);

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('member_code', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $members = $query->orderBy('name')->get();

        return view('members.index', compact('members', 'search'));
    }

    public function create()
    {
        $memberships = Membership::active()->orderBy('price')->get();
        $nextCode = $this->nextMemberCode();

        return view('members.create', compact('memberships', 'nextCode'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatedMember($request);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members', 'public');
        }

        Member::create([
            'member_code' => $this->nextMemberCode(),
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'membership_id' => $validated['membership_id'],
            'joined_at' => $validated['joined_at'],
            'photo' => $photoPath,
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member registered successfully.');
    }

    public function edit(Member $member)
    {
        $memberships = Membership::active()->orderBy('price')->get();

        return view('members.edit', compact('member', 'memberships'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $this->validatedMember($request);

        $photoPath = $member->photo;
        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $photoPath = $request->file('photo')->store('members', 'public');
        }

        if ($request->boolean('remove_photo') && $member->photo) {
            Storage::disk('public')->delete($member->photo);
            $photoPath = null;
        }

        $member->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'membership_id' => $validated['membership_id'],
            'joined_at' => $validated['joined_at'],
            'photo' => $photoPath,
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return redirect()
            ->route('members.index')
            ->with('success', 'Member deleted.');
    }

    private function validatedMember(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'membership_id' => ['required', 'exists:memberships,id'],
            'joined_at' => ['required', 'date'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'remove_photo' => ['nullable', 'boolean'],
        ]);
    }

    private function nextMemberCode(): string
    {
        $last = Member::orderByDesc('id')->first();

        if (! $last) {
            return 'GYM001';
        }

        $number = (int) preg_replace('/\D/', '', $last->member_code);

        return 'GYM'.str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    }
}
