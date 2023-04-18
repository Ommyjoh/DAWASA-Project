<?php

namespace App\Http\Controllers\lgo;

use App\Helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LgoLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:lgos', ['except' => ['logout']]);
    }

    public function login()
    {
        return view('lgo.login');
    }

    public function submit(Request $request)
    {
        $remember = ($request->remember) ? true : false;

        if (auth('lgos')->attempt(['phone' => $request->phone, 'password' => $request->password], $remember)) {
            $greeting = SettingsHelper::getGreeting();
            $lgo = auth('lgos')->user()->messenger;
            Toastr::info($greeting . ' ' . $lgo . '!' . ' Welcome back!');
            return redirect()->route('lgo.dashboard');
        }

        return redirect()->back()->withInput($request->only('phone', 'remember', 'password'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        auth()->guard('lgos')->logout();

        $request->session()->invalidate();

        return redirect()->route('lgo.login');
    }
}
