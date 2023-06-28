<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use Carbon\Carbon;
use Livewire\Component;

class CustCareApproveFile extends Component
{
    public $request;
    public $state = [];

    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function saveChanges(){

        ConnectionRequest::where('id', $this->request->id)
        ->update([
            'connApproveDate' => Carbon::now(),
            'isConnected' => 'Yes',
            'meterNo' => $this->state['meterNumber'],
            'meterSize' => $this->state['meterSize'],
            'initialReading' => $this->state['initialReading'],
            'plumber' => $this->state['plumber'],
            'connDays' => $this->state['daysComplete'],
            'Authorizer' => $this->state['Authorizer'],
            'remarks' => $this->state['remarks'],
        ]);

        session()->flash('success', 'Customer file updated successfully!');

        return redirect()->route('custcare.connectionfiles');
    }
    public function render()
    {
        return view('livewire.staff.custcare.cust-care-approve-file');
    }
}
