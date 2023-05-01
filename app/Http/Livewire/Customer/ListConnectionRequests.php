<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListConnectionRequests extends Component
{
    public function render()
    {
        $requests = ConnectionRequest::where('user_id', auth()->user()->id)->latest()->get();
        return view('livewire.customer.list-connection-requests', [
            'requests' => $requests
        ]);
    }
}
