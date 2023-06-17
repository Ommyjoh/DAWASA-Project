<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class SurveyorViewInvoice extends Component
{

    public $request, $invoices, $totalAmount;

    public function mount($connection_request_id)
    {
        $this->request = ConnectionRequest::findOrFail($connection_request_id);
        $this->invoices = $this->request->invoice;
        $this->totalAmount = $this->invoices->sum('amount');
    }
    public function render()
    {
        $vat = $this->totalAmount * 0.18;
        $newConnectionFee = 26000;
        $meterDepositFee = 50000;
        $backfillingFee = 2000;
        $grandTotal = ($this->totalAmount - $vat) + $newConnectionFee + $meterDepositFee + $backfillingFee;
        
        return view('livewire.staff.surveyor.surveyor-view-invoice', [
            'newConnectionFee'  => $newConnectionFee ,
            'meterDepositFee'  => $meterDepositFee ,
            'backfillingFee' =>   $backfillingFee,
            'vat' => $vat,
            'grandTotal' => $grandTotal
        ]);
    }
}
