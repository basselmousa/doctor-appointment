<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.childrens.childrens');
    }

}
