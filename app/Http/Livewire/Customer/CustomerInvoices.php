<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomerInvoices extends Component
{
    public function render()
    {

        $invoices = ConnectionRequest::select(
            'connection_requests.id',
            'invoices.controlNumber',
            'invoices.paymentStatus',
            'invoices.invoiceNo',
            'connection_requests.jobTitle',
            'connection_requests.fullName',
            DB::raw('DATE(invoices.created_at) as created_date'),
            DB::raw('SUM(invoices.amount) as total_amount')
            )
            ->leftJoin('invoices', 'connection_requests.id', '=', 'invoices.connection_requests_id')
            ->where('connection_requests.user_id', auth()->user()->id)
            ->where('invoices.engineerStatus', 'Approved')
            ->groupBy('connection_requests.id', 'invoices.controlNumber', 'invoices.paymentStatus', 'invoices.invoiceNo', 'connection_requests.jobTitle', 'connection_requests.fullName', 'created_date')
            ->get();
    
    
    


        // dd($invoices);

        return view('livewire.customer.customer-invoices', [
            'invoices' => $invoices
        ]);
    }
}
