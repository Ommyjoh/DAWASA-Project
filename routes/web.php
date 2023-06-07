<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\LGO\LGODashboardController;
use App\Http\Controllers\lgo\LgoLoginController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\staff\StaffLoginController;
use App\Http\Livewire\Customer\CreateRequest;
use App\Http\Livewire\Customer\ListConnectionRequests;
use App\Http\Livewire\Customer\ListCustomerSurveyors;
use App\Http\Livewire\Customer\ViewCustomerRequest;
use App\Http\Livewire\Lgo\ListLgoConnectionRequests;
use App\Http\Livewire\Lgo\ViewConnectionRequest;
use App\Http\Livewire\Staff\Custcare\ListRequestsToCustCare;
use App\Http\Livewire\Staff\Custcare\ViewRequestToCustCare;
use App\Http\Livewire\Staff\Surveyor\EditCustomerRequest;
use App\Http\Livewire\Staff\Surveyor\ListSurveyorRequests;
use App\Http\Livewire\Staff\Surveyor\ListSettledSurveying;
use App\Http\Livewire\Staff\Users\ListCustomers;
use App\Http\Livewire\Staff\Users\ListLgo;
use App\Http\Livewire\Staff\Users\ListStaffs;
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

Route::get('unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


Auth::routes();


/*
|--------------------------------------------------------------------------
|                      *** CUSTOMER ROUTES ***
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
    Route::get('dashboard',[CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('listrequests', ListConnectionRequests::class)->name('customer.listrequests');
    Route::get('createrequest', CreateRequest::class)->name('customer.createrequest');
    Route::get('viewrequest/{request}', ViewCustomerRequest::class)->name('customer.viewrequest');
    Route::get('listsurveyors', ListCustomerSurveyors::class)->name('customer.surveyors');
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
    Route::get('custcare/allrequests', ListRequestsToCustCare::class)->name('custcare.allrequests');
    Route::get('custcare/viewrequest/{request}', ViewRequestToCustCare::class)->name('custcare.viewrequests');
    Route::get('surveyor/listtasks', ListSurveyorRequests::class)->name('surveyor.listtasks');
    Route::get('surveyor/listsettledtasks', ListSettledSurveying::class)->name('surveyor.listsettledtasks');
    Route::get('surveyor/viewrequest/{request}', EditCustomerRequest::class)->name('surveyor.viewrequests');
    
    Route::group(['middleware' => 'staff_mgt'], function () {
        Route::get('staffs', ListStaffs::class)->name('staff.allstaffs');
    });
});


/*
|--------------------------------------------------------------------------
|                      *** LGO ROUTES ***
|--------------------------------------------------------------------------
*/

// lgo auth routes
Route::group(['prefix' => 'lgo'], function () {
    Route::get('login',[LgoLoginController::class, 'login'])->name('lgo.login');
    Route::post('submit',[LgoLoginController::class, 'submit'])->name('lgo.submit');
    Route::post('logout', [LgoLoginController::class, 'logout'])->name('lgo.logout');
});

Route::group(['prefix' => 'lgo', 'middleware' => 'lgos'], function () {
    Route::get('dashboard', LGODashboardController::class)->name('lgo.dashboard');
    Route::get('listrequests', ListLgoConnectionRequests::class)->name('lgo.listrequests');
    Route::get('viewrequest/{request}', ViewConnectionRequest::class)->name('lgo.viewrequest');
});