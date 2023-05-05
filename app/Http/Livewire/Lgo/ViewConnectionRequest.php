<?php

namespace App\Http\Livewire\Lgo;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ViewConnectionRequest extends Component
{
    public $checked = false;
    public $request;

    public $action;

    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function getAction($action){
        $this->action = $action;
    }
    public function render()
    {
        return view('livewire.lgo.view-connection-request');
    }
}
