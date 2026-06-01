<?php

namespace App\Http\Controllers;

use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::active()->orderBy('price')->get();

        return view('memberships.index', compact('memberships'));
    }
}
