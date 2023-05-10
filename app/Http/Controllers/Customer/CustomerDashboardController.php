<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ConnectionRequest;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public $customerWithRequests;


    public function dashboard()
    {
        $customer = auth()->user();
        $this->customerWithRequests = $customer->connectionRequests;

        // dd($this->customerWithRequests);
        // $approvedRequests = ConnectionRequest::where('user_id', auth()->user()->id);
        return view('customer.dashboard', [
            'customerWithRequests' => $this->customerWithRequests,
        ]);
    }

}
