<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use App\Models\Invoice;
use Livewire\Component;

class SurveyorViewInvoice extends Component
{

    public $request, $invoice;

    public function mount($connection_request_id)
    {
        $this->request = ConnectionRequest::findOrFail($connection_request_id);
        $this->invoice = $this->request->invoice;
    }
    public function render()
    {
        dd($this->invoice);
        return view('livewire.staff.surveyor.surveyor-view-invoice');
    }
}
