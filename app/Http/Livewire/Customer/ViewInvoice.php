<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ViewInvoice extends Component
{

    public $request, $invoices, $totalAmount, $action, $uniqueControlNumbers;

    public function mount($connection_request_id)
    {
        $this->request = ConnectionRequest::findOrFail($connection_request_id);
        $this->invoices = $this->request->invoice;
        $this->totalAmount = $this->invoices->sum('amount');
        $this->uniqueControlNumbers = $this->invoices->pluck('controlNumber')->unique();
    }
    public function render()
    {
        $vat = $this->totalAmount * 0.18;
        $newConnectionFee = 26000;
        $meterDepositFee = 50000;
        $backfillingFee = 2000;
        $grandTotal = ($this->totalAmount - $vat) + $newConnectionFee + $meterDepositFee + $backfillingFee;
        return view('livewire.customer.view-invoice', [
            'newConnectionFee'  => $newConnectionFee ,
            'meterDepositFee'  => $meterDepositFee ,
            'backfillingFee' =>   $backfillingFee,
            'vat' => $vat,
            'grandTotal' => $grandTotal
        ]);
    }
}
