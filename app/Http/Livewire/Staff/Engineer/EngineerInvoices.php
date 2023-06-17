<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EngineerInvoices extends Component
{
    public function render()
    {

        $invoices = Invoice::with('connectionRequest.user')
                    ->select('invoices.connection_requests_id', 'invoices.engineerStatus', 'invoices.paymentStatus', 'connection_requests.jobTitle', 'connection_requests.fullName', 'connection_requests.phone', DB::raw('DATE(invoices.created_at) as created_date'), DB::raw('SUM(invoices.amount) as total_amount'))
                    ->join('connection_requests', 'invoices.connection_requests_id', '=', 'connection_requests.id')
                    ->join('staff', 'connection_requests.staff_id', '=', 'staff.id')
                    ->where('staff.office', auth('staff')->user()->office)
                    ->groupBy('invoices.connection_requests_id', 'invoices.engineerStatus', 'invoices.paymentStatus', 'connection_requests.jobTitle', 'connection_requests.fullName', 'connection_requests.phone', 'created_date')
                    ->latest('invoices.created_at')
                    ->get();

        return view('livewire.staff.engineer.engineer-invoices', [
            'invoices' => $invoices
        ]);
    }
}
