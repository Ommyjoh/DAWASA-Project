<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ConnectionRequest;
use App\Models\Lgo;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('staff.dashboard');
    }

    public function dashboard()
    {
        return view('staff.dashboard', [
            'allCustomers' => User::all()->count(),
            'allLgos' => Lgo::all()->count(),
            'allStaffs' => Staff::all()->count(),
            'allRequests' => ConnectionRequest::where('lgoStatus', 'Approved')->count(),
            'pendingRequests' => ConnectionRequest::where('dawasaStatus', 'Pending')->count(),
            'approvedRequests' => ConnectionRequest::where('dawasaStatus', 'Approved')->count(),
            'rejectedRequests' => ConnectionRequest::where('dawasaStatus', 'Rejected')
                                                    ->whereNotNull('dawasaNote')
                                                    ->count()
        ]);
    }
}
