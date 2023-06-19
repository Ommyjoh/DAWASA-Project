<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class EngineerViewInvoice extends Component
{

    public $request, $invoices, $totalAmount, $action, $uniqueControlNumbers;

    public $state = [];

    public function mount($connection_request_id)
    {
        $this->request = ConnectionRequest::findOrFail($connection_request_id);
        $this->invoices = $this->request->invoice;
        $this->totalAmount = $this->invoices->sum('amount');
        $this->uniqueControlNumbers = $this->invoices->pluck('controlNumber')->unique();
    }

    public function getAction($action){
        $this->action = $action;
    }

    public function saveChanges(){
        $randomNumber = mt_rand(100000000, 999999999);
        if($this->action == 'Approved') {
            foreach ($this->invoices as $invoice) {
                $invoice->engineerStatus = $this->state['status'];
                $invoice->controlNumber = '994'.$randomNumber;
                $invoice->engineerNote = NULL;
                $invoice->save();
            }
        }

        if($this->action == 'Rejected') {
            foreach ($this->invoices as $invoice) {
                $invoice->engineerStatus = $this->state['status'];
                $invoice->controlNumber = NULL;
                $invoice->engineerNote = $this->state['note'];
                $invoice->save();
            }
        }

    session()->flash('success', 'Invoice action submitted successfully!');

    return redirect()->route('engineer.allinvoices');
    }

    public function render()
    {

        
        $vat = $this->totalAmount * 0.18;
        $newConnectionFee = 26000;
        $meterDepositFee = 50000;
        $backfillingFee = 2000;
        $grandTotal = ($this->totalAmount - $vat) + $newConnectionFee + $meterDepositFee + $backfillingFee;

        return view('livewire.staff.engineer.engineer-view-invoice', [
            'newConnectionFee'  => $newConnectionFee ,
            'meterDepositFee'  => $meterDepositFee ,
            'backfillingFee' =>   $backfillingFee,
            'vat' => $vat,
            'grandTotal' => $grandTotal
        ]);
    }
}
