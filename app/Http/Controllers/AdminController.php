<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('dashboard.admin.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.doctors.home');
        } else {
            throw $this->sendFailedLoginResponse($request);

        }
    }

    public function signUpForm()
    {
        return view('dashboard.admin.auth.register');
    }

    public function signUp(Request $request)
    {

        $request->validate([
            'phone_number' => 'required|unique:admins,phone_number',
            'full_name' => 'required',
            'certificates' => 'required',
            'email' => ['required', 'unique:admins,email'],
            'days' => 'required',
            'start' => 'required',
            'end' => 'required|after_or_equal:start',
            'password' => 'required|confirmed',
            'img' => 'required|mimes:jpeg,jpg,png'
        ]);
        $days ='';

        foreach ($request->only('days') as $item) {

            foreach ($item as $value) {
                $days .= $value . ',' ;
            }
        }
        $request->days = $days;


        try {

            event(new Registered($user = $this->create($request)));

            Auth::guard('admin')->login($user);


            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect()->route('admin.doctors.home');

        } catch (\Exception $e) {

            return redirect()->route('admin.loginForm')->with('error', $e->getMessage());
        }


    }

    /** @noinspection PhpUnhandledExceptionInspection */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    private function create(Request $request)
    {

        return Admin::create([
            'phone_number' => $request->phone_number,
            'full_name' => $request->full_name,
            'certificates' => $request->certificates,
            'days' => $request->days,
            'start' => $request->start,
            'email' => $request->email,
            'end' => $request->end,
            'password' => Hash::make($request->password),
            'image' => $this->getImage($request)
        ]);

    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    private function getImage(Request $request)
    {
        if ($request->hasFile('img')){
            $request->file('img')->store('images','public');
            return $request->file('img')->hashName();
        }
        return '';
    }

}
