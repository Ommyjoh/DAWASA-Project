<?php

namespace App\Http\Controllers\LGO;

use App\Http\Controllers\Controller;
use App\Models\ConnectionRequest;
use Illuminate\Http\Request;

class LGODashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('lgo.lgodashboard', [
            'allRequests' => ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->count(),
            'pendingRequests' => ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->where('lgoStatus', 'Pending')->count(),
            'approvedRequests' => ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->where('lgoStatus', 'Approved')->count(),
            'rejectedRequests' => ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->where('lgoStatus', 'Rejected')->count(),
            'requests' => ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->latest()->limit(5)->get()
        ]);
    }
}
