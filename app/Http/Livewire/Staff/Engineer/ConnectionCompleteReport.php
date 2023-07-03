<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ConnectionCompleteReport extends Component
{
    public function render()
    {

        $connectionRequests = ConnectionRequest::whereHas('invoice', function ($query) {
            $query->where('paymentStatus', 'paid')
                    ->where('isConnected', 'Yes');
            })->latest()
            ->get();

        return view('livewire.staff.engineer.connection-complete-report', [
            'connectionRequests' => $connectionRequests
        ]);
    }
}
