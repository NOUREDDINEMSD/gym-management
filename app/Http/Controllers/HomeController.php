<?php

namespace App\Http\Controllers;

use App\Models\Membership;

class HomeController extends Controller
{
    public function index()
    {
        $memberships = Membership::active()->orderBy('price')->get();

        return view('home', compact('memberships'));
    }
}
