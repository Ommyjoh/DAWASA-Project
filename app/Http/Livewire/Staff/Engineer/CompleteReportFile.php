<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class CompleteReportFile extends Component
{

    public $request, $invoices, $totalAmount, $uniqueControlNumbers, $uniqueInvoiceNumber;

    public function mount(ConnectionRequest $request){
        $this->request = $request;
        $this->invoices = $this->request->invoice;
        $this->totalAmount = $this->invoices->sum('amount');
        $this->uniqueControlNumbers = $this->invoices->pluck('controlNumber')->unique();
        $this->uniqueInvoiceNumber = $this->invoices->pluck('invoiceNo')->unique();

    }
    public function render()
    {
        $vat = $this->totalAmount * 0.18;
        $newConnectionFee = 26000;
        $meterDepositFee = 50000;
        $backfillingFee = 2000;
        $grandTotal = ($this->totalAmount - $vat) + $newConnectionFee + $meterDepositFee + $backfillingFee;
        
        return view('livewire.staff.engineer.complete-report-file', [
            'newConnectionFee'  => $newConnectionFee ,
            'meterDepositFee'  => $meterDepositFee ,
            'backfillingFee' =>   $backfillingFee,
            'vat' => $vat,
            'grandTotal' => $grandTotal
        ]);
    }
}
