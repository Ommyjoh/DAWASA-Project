<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListRequestsToCustCare extends Component
{
    public function render()
    {

        $requests = ConnectionRequest::where('lgoStatus', 'Approved')->latest()->get();
        return view('livewire.staff.custcare.list-requests-to-cust-care', [
            'requests'=> $requests
        ]);
    }
}
