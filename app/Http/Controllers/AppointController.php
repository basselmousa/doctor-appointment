<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    //
    public function index()
    {
        $appoints = auth('admin')->user()->appoints;

        return view('dashboard.appoints.appoints', compact('appoints'));
    }

    public function done_user(Request $request, User $user, Vaccine $vaccine)
    {
        $user->vaccines()->attach([
            'vaccine_id' => $vaccine->id
        ]);
        return redirect()->route('admin.appoints.home');
    }
}
