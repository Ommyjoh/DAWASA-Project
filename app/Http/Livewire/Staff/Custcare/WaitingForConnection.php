<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use Livewire\Component;

class WaitingForConnection extends Component
{
    public function render()
    {
        $connectionRequests = ConnectionRequest::whereHas('invoice', function ($query) {
                                $query->where('paymentStatus', 'paid')
                                        ->where('isConnected', 'No');
                            })->latest()
                            ->get();

                            // dd($connectionRequests);
        return view('livewire.staff.custcare.waiting-for-connection', [
            'connectionRequests' => $connectionRequests
        ]);
    }
}
