<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    //
    public function index()
    {
        $vaccines = auth('admin')->user()->vaccines;
        $not_in = [];
        foreach ($vaccines as $vaccine) {
            $not_in[]= $vaccine->id;
        }
        $all_vaccines = Vaccine::all()->whereNotIn('id', $not_in);

        return view('dashboard.vaccines.vaccines', compact('vaccines', 'all_vaccines'));
    }

    public function add_vaccine(Request $request)
    {
        $request->validate([
           'vaccine' => 'required|not_in:0'
        ]);
        auth('admin')->user()->vaccines()->attach([
            'vaccine_id' => $request->vaccine
        ]);

        return redirect()->route('admin.vaccines.home');
    }

    public function delete_vaccine(Request $request, Vaccine $vaccine)
    {
        auth('admin')->user()->vaccines()->detach($vaccine);
        return redirect()->route('admin.vaccines.home');
    }

    public function add_vaccine_form()
    {
        return view('dashboard.vaccines.add_vaccine');
    }

    public function add_vaccine_form_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required'
        ]);
        Vaccine::create([
            'vaccines_name' => $request->name,
            'vaccines_age' => $request->age
        ]);
        return redirect()->route('add_vaccine');
    }
}
