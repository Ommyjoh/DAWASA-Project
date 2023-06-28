<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListConnectedRequests extends Component
{
    public function render()
    {
        $connectionRequests = ConnectionRequest::whereHas('invoice', function ($query) {
            $query->where('paymentStatus', 'paid')
                    ->where('user_id', auth()->user()->id)
                    ->where('isConnected', 'Yes');
            })->latest()
            ->get();
        return view('livewire.customer.list-connected-requests', [
            'connectionRequests' => $connectionRequests
        ]);
    }
}
