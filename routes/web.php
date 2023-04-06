<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\LGO\LGODashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();


/*
|--------------------------------------------------------------------------
|                      *** CUSTOMER ROUTES ***
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'customer'], function () {
    Route::get('dashboard',[CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
});

/*
|--------------------------------------------------------------------------
|                      *** STAFF ROUTES ***
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'staff'], function () {
    Route::get('dashboard',[StaffDashboardController::class, 'dashboard'])->name('staff.dashboard');
});


Route::get('lgo/dashboard', LGODashboardController::class);
Route::get('staff/dashboard', StaffDashboardController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
