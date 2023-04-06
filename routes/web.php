<?php

use App\Http\Controllers\Customer\CustDashboardController;
use App\Http\Controllers\LGO\LGODashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('customer/dashboard', CustDashboardController::class);
Route::get('lgo/dashboard', LGODashboardController::class);
Route::get('staff/dashboard', StaffDashboardController::class);