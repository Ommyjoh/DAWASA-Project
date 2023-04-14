<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\LGO\LGODashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\staff\StaffLoginController;
use App\Http\Livewire\Staff\Users\ListCustomers;
use App\Http\Livewire\Staff\Users\ListLgo;
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

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
    Route::get('dashboard',[CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
});

/*
|--------------------------------------------------------------------------
|                      *** STAFF ROUTES ***
|--------------------------------------------------------------------------
*/

// staff auth routes
Route::group(['prefix' => 'staff'], function () {
    Route::get('login',[StaffLoginController::class, 'login'])->name('staff.login');
    Route::post('submit',[StaffLoginController::class, 'submit'])->name('login.submit');
    Route::post('logout', [StaffLoginController::class, 'logout'])->name('staff.logout');
});


Route::group(['prefix' => 'staff', 'middleware' => 'staff'], function () {
    Route::get('dashboard',[StaffDashboardController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('customers', ListCustomers::class)->name('staff.customers');
    Route::get('lgo', ListLgo::class)->name('staff.lgo');
});


/*
|--------------------------------------------------------------------------
|                      *** LGO ROUTES ***
|--------------------------------------------------------------------------
*/
Route::get('lgo/dashboard', LGODashboardController::class)->name('lgo.dashboard');