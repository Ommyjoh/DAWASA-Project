<?php

namespace App\Http\Controllers\staff;

use App\Helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StaffLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:staff', ['except' => ['logout']]);
    }

    public function login()
    {
        return view('staff.login');
    }

    public function submit(Request $request)
    {
        $remember = ($request->remember) ? true : false;

        if (auth('staff')->attempt(['phone' => $request->phone, 'password' => $request->password], $remember)) {
            $greeting = SettingsHelper::getGreeting();
            $staff = auth('staff')->user()->name;
            Toastr::info($greeting . ' ' . $staff . '!' . ' Welcome back!');
            return redirect()->route('staff.dashboard');
        }

        return redirect()->back()->withInput($request->only('phone', 'remember', 'password'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        auth()->guard('staff')->logout();

        $request->session()->invalidate();

        return redirect()->route('staff.login');
    }
}
