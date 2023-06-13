<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllInvoices extends Component
{
    public function render()
    {
        $invoices = Invoice::with('connectionRequest.user')
                    ->select('invoices.connection_requests_id', 'connection_requests.jobTitle', 'connection_requests.fullName', 'connection_requests.phone', DB::raw('DATE(invoices.created_at) as created_date'), DB::raw('SUM(invoices.amount) as total_amount'))
                    ->join('connection_requests', 'invoices.connection_requests_id', '=', 'connection_requests.id')
                    ->where('connection_requests.staff_id', auth('staff')->user()->id)
                    ->groupBy('invoices.connection_requests_id', 'connection_requests.jobTitle', 'connection_requests.fullName', 'connection_requests.phone', 'created_date')
                    ->latest('invoices.created_at')
                    ->get();






        // dd($invoices);
        return view('livewire.staff.surveyor.all-invoices', [
            'invoices' => $invoices
        ]);
    }
}
