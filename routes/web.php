<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\LGO\LGODashboardController;
use App\Http\Controllers\lgo\LgoLoginController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\staff\StaffLoginController;
use App\Http\Livewire\Customer\CreateRequest;
use App\Http\Livewire\Customer\CustomerInvoices;
use App\Http\Livewire\Customer\ListConnectedRequests;
use App\Http\Livewire\Customer\ListConnectionRequests;
use App\Http\Livewire\Customer\ListCustomerSurveyors;
use App\Http\Livewire\Customer\ViewCustomerRequest;
use App\Http\Livewire\Customer\ViewInvoice;
use App\Http\Livewire\Lgo\ListLgoConnectionRequests;
use App\Http\Livewire\Lgo\ViewConnectionRequest;
use App\Http\Livewire\Staff\Custcare\ConnectionCompleteFiles;
use App\Http\Livewire\Staff\Custcare\CustCareApproveFile;
use App\Http\Livewire\Staff\Custcare\CustomerCompleteFiles;
use App\Http\Livewire\Staff\Custcare\ListRequestsToCustCare;
use App\Http\Livewire\Staff\Custcare\ViewCustomerFile;
use App\Http\Livewire\Staff\Custcare\ViewRequestToCustCare;
use App\Http\Livewire\Staff\Custcare\WaitingForConnection;
use App\Http\Livewire\Staff\Engineer\CompleteReportFile;
use App\Http\Livewire\Staff\Engineer\ConnectionCompleteReport;
use App\Http\Livewire\Staff\Engineer\EngineerInvoices;
use App\Http\Livewire\Staff\Engineer\EngineerViewInvoice;
use App\Http\Livewire\Staff\Engineer\RequestToConnectionReport;
use App\Http\Livewire\Staff\Engineer\WaitingConnectionReport;
use App\Http\Livewire\Staff\Surveyor\AllInvoices;
use App\Http\Livewire\Staff\Surveyor\CreateInvoice;
use App\Http\Livewire\Staff\Surveyor\EditCustomerRequest;
use App\Http\Livewire\Staff\Surveyor\ListSurveyorRequests;
use App\Http\Livewire\Staff\Surveyor\ListSettledSurveying;
use App\Http\Livewire\Staff\Surveyor\RequestsToInvoice;
use App\Http\Livewire\Staff\Surveyor\SurveyorViewInvoice;
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
    Route::get('invoices', CustomerInvoices::class)->name('customer.invoices');
    Route::get('viewinvoice/{connection_request_id}', ViewInvoice::class)->name('customer.viewinvoice');
    Route::get('connectedrequests', ListConnectedRequests::class)->name('customer.connectedrequests');
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
    
    Route::group(['middleware' => 'staff_mgt'], function () {
        Route::get('staffs', ListStaffs::class)->name('staff.allstaffs');
    });

    Route::group(['middleware' => 'cust_care_fncts'], function () {
        Route::get('customers', ListCustomers::class)->name('staff.customers');
        Route::get('lgo', ListLgo::class)->name('staff.lgo');
        Route::get('custcare/allrequests', ListRequestsToCustCare::class)->name('custcare.allrequests');
        Route::get('custcare/viewrequest/{request}', ViewRequestToCustCare::class)->name('custcare.viewrequests');
        Route::get('custcare/waitingforconnection', WaitingForConnection::class)->name('custcare.waitingforconnection');
        Route::get('custcare/viewcustomerfile/{request}', ViewCustomerFile::class)->name('custcare.viewcustomerfile');
        Route::get('custcare/approvefile/{request}', CustCareApproveFile::class)->name('custcare.approvefile');
        Route::get('custcare/connectionfiles', ConnectionCompleteFiles::class)->name('custcare.connectionfiles');
        Route::get('custcare/completefile/{request}', CustomerCompleteFiles::class)->name('custcare.completefile');
    });

    Route::group(['middleware' => 'surveyor_fncts'], function () {
        Route::get('surveyor/listtasks', ListSurveyorRequests::class)->name('surveyor.listtasks');
        Route::get('surveyor/listsettledtasks', ListSettledSurveying::class)->name('surveyor.listsettledtasks');
        Route::get('surveyor/viewrequest/{request}', EditCustomerRequest::class)->name('surveyor.viewrequests');
        Route::get('surveyor/requeststoinvoice', RequestsToInvoice::class)->name('surveyor.requeststoinvoice');
        Route::get('surveyor/createinvoice/{request}', CreateInvoice::class)->name('surveyor.createinvoice');
        Route::get('surveyor/allinvoices', AllInvoices::class)->name('surveyor.allinvoices');
        Route::get('surveyor/surveyorviewinvoice/{connection_request_id}', SurveyorViewInvoice::class)->name('surveyor.surveyorviewinvoice'); 
    });

    Route::group(['middleware' => 'engineer_fncts'], function () {
        Route::get('engineer/allinvoices', EngineerInvoices::class)->name('engineer.allinvoices');
        Route::get('engineer/engieerviewinvoice/{connection_request_id}', EngineerViewInvoice::class)->name('engineer.engineerviewinvoice');
        Route::get('reports/requesttoconnection', RequestToConnectionReport::class)->name('reports.requesttoconnection');
        Route::get('reports/waitingforconnection', WaitingConnectionReport::class)->name('reports.waitingforconnection');
        Route::get('reports/connectioncomplete', ConnectionCompleteReport::class)->name('reports.connectioncomplete');
        Route::get('reports/completefile/{request}', CompleteReportFile::class)->name('reports.completefile');
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