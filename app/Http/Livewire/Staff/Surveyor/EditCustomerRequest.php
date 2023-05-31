<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class EditCustomerRequest extends Component
{

    public $request;
    public function mount(ConnectionRequest $connection){
        $this->request = $connection;
    }
    public function render()
    {

        return view('livewire.staff.surveyor.edit-customer-request');
    }
}
