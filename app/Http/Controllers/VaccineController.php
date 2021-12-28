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
        return view('dashboard.vaccines.vaccines', compact('vaccines'));
    }

    public function delete_vaccine(Request $request, Vaccine $vaccine)
    {
        auth('admin')->user()->vaccines()->detach($vaccine);
        return redirect()->route('admin.vaccines.home');
    }
}
