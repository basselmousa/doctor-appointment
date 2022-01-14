<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    //

    public function index()
    {
        $children = Admin::children();

        return view('dashboard.childrens.childrens', compact('children'));
    }

}
