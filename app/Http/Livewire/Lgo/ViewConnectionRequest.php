<?php

namespace App\Http\Livewire\Lgo;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ViewConnectionRequest extends Component
{

    public $request;

    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }
    public function render()
    {
        return view('livewire.lgo.view-connection-request');
    }
}
