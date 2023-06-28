<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ConnectionCompleteFiles extends Component
{
    public function render()
    {
        $connectionRequests = ConnectionRequest::whereHas('invoice', function ($query) {
                            $query->where('paymentStatus', 'paid')
                                    ->where('isConnected', 'Yes');
                            })->latest()
                            ->get();
        return view('livewire.staff.custcare.connection-complete-files', [
            'connectionRequests' => $connectionRequests
        ]);
    }
}
