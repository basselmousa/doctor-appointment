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
             $vaccine->id => ['admin_id' => auth('admin')->id()],

        ]);
        $user->appoints()->where('vaccine_id', '=', $vaccine->id)->delete();
        return redirect()->route('admin.appoints.home');
    }

    public function delete_user(Request $request, User $user, Vaccine $vaccine)
    {
        $user->appoints()->where('vaccine_id', '=', $vaccine->id)->delete();
        return redirect()->route('admin.appoints.home');
    }
}
