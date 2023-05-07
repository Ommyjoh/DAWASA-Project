<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ViewCustomerRequest extends Component
{

    public $request;
    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }
    public function render()
    {
        return view('livewire.customer.view-customer-request');
    }
}
