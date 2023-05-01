<?php

namespace App\Http\Livewire\Lgo;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListLgoConnectionRequests extends Component
{
    public function render()
    {
        $requests = ConnectionRequest::where('lgo_id', auth('lgos')->user()->id)->latest()->get();
        return view('livewire.lgo.list-lgo-connection-requests', [
            'requests' => $requests
        ]);
    }
}
