<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class RequestsToInvoice extends Component
{
    public function render()
    {
        $requests = ConnectionRequest::where('staff_id', auth('staff')->user()->id)
        ->where('surveyorStatus', 'Approved')
        ->orWhere('surveyorStatus', 'Rejected')
        ->latest()
        ->get();
        return view('livewire.staff.surveyor.requests-to-invoice', [
            'requests' => $requests
        ]);
    }
}
