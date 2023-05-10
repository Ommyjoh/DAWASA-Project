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

        return view('customer.dashboard', [
            'customerWithRequests' => $this->customerWithRequests,
            'allRequests' => $this->customerWithRequests->count(),
            'pendingRequests' => ConnectionRequest::query()->where('user_id', auth()->user()->id)->where('lgoStatus', 'Pending')->orWhere('dawasaStatus', 'Pending')->count(),
            'approvedRequests' => ConnectionRequest::query()->where('user_id', auth()->user()->id)->where('lgoStatus', 'Approved')->where('dawasaStatus', 'Approved')->count(),
            'rejectedRequests' => ConnectionRequest::query()->where('user_id', auth()->user()->id)->where('lgoStatus', 'Rejected')->orWhere('dawasaStatus', 'Rejected')->count(),
        ]);
    }

}
