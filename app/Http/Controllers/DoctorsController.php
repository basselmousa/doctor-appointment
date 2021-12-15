<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DoctorsController extends Controller
{
    //

    public function index()
    {
        $admins = Admin::all();
//        dd(explode(',',$admins[0]->days));
        return view('dashboard.doctors.doctors', compact('admins'));
    }

}
