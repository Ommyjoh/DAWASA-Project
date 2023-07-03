<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class WaitingConnectionReport extends Component
{
    public function render()
    {

        $connectionRequests = ConnectionRequest::whereHas('invoice', function ($query) {
            $query->where('paymentStatus', 'paid')
                    ->where('isConnected', 'No');
        })->latest()
        ->get();

        return view('livewire.staff.engineer.waiting-connection-report', [
            'connectionRequests' => $connectionRequests
        ]);
    }
}
