<?php

namespace App\Http\Controllers\LGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LGODashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('lgo.lgodashboard');
    }
}
