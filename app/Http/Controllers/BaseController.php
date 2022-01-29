<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
            'vaccine' => ['required'],
            'date' => 'required|after_or_equal:'.Carbon::today()
        ]);

        $days = [];
        foreach (explode(',', $id->days) as $day) {
            $days [] = Str::ucfirst($day);
        }
        $days = collect($days);

        if (!$days->contains(Carbon::make($request->date)->getTranslatedDayName())){
            throw  ValidationException::withMessages([
               'date' => 'please choose a date that doctor works in'
            ]);
        }

        auth('web')->user()->appoints()->create([
           'admin_id' => $id->id,
            'time' => $request->time,
            'day' => $request->day,
            'vaccine_id' => $request->vaccine,
            'date' => $request->date
        ]);
        return redirect()->route('welcome');
    }

    public function user_vaccines()
    {

        $taked = User::taked();
        return view('user-vaccines', compact('taked'));
    }
}
