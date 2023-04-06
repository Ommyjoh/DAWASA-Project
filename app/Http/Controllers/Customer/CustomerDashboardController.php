<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    //     return view('customer.dashboard');
    // }

    public function dashboard()
    {
        return view('customer.dashboard');
    }

}
