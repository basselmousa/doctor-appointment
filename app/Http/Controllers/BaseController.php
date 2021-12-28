<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public function index()
    {
        $doctors = Admin::all();
        return view('welcome', compact('doctors'));
    }
    public function doctors()
    {
        $doctors = Admin::all();
        return view('doctors', compact('doctors'));
    }

    public function view_doctor(Admin $id)
    {
        $vaccines = $id->vaccines;
        return view('view-doctor', compact('id', 'vaccines'));
    }

    public function make_appoint(Request $request, Admin $id)
    {
        $request->validate([
            'time' => ['required', 'after_or_equal:'.$id->start, 'before_or_equal:'.$id->end],
            'day' => ['required'],
            'vaccine' => ['required']
        ]);

        auth('web')->user()->appoints()->create([
           'admin_id' => $id->id,
            'time' => $request->time,
            'day' => $request->day,
            'vaccine_id' => $request->vaccine
        ]);
        return redirect()->route('welcome');
    }
}
