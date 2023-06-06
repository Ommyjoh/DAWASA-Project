<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditCustomerRequest extends Component
{
    public $state = [];
    public $action;

    public function getAction($action){
        $this->action = $action;
    }

    public function saveChanges(){

            if($this->action === 'Rejected') {
                Validator::make([
                'state' => $this->state
            ],
            [
                'state.reason' => 'required'
            ],
            [
                'state.reason.required' => 'Please state reason for request rejection',
            ]) ->validate();

            ConnectionRequest::where('id', $this->request->id)
            ->update([
                'dawasaStatus' => $this->state['action'],
                'surveyorStatus' => $this->state['action'],
                'dawasaNote' => $this->state['reason'],
                'surveyorApprovedDate' => Carbon::now()
            ]);    

        } elseif($this->action === 'Approved') {

            Validator::make([
                'state' => $this->state
            ],
            [
                'state.title' => 'required',
                'state.distance' => 'required',
                'state.x' => 'required',
                'state.y' => 'required'
            ],
            [
                'state.title.required' => 'Please choose job title',
                'state.distance.required' => 'Please fill distance from main meter',
                'state.x.required' => 'Please fill coordinate X',
                'state.y.required' => 'Please fill coordinate Y',
            ]) ->validate();

            ConnectionRequest::where('id', $this->request->id)
            ->update([
                'dawasaStatus' => $this->state['action'],
                'surveyorStatus' => $this->state['action'],
                'dawasaNote' => NULL,
                'jobTitle' => $this->state['title'],
                'distance' => $this->state['distance'],
                'cordX' => $this->state['x'],
                'cordY' => $this->state['y'],
                'surveyorApprovedDate' => Carbon::now()
            ]);    

        } else {

            Validator::make([
                'state' => $this->state
            ],
            [
                'state.action' => 'required',
            ],
            [
                'state.action.required' => 'Please choose action',
            ]) ->validate();

            return;

        }

        session()->flash('success', 'Action submitted successfully!');

        return redirect()->route('surveyor.listtasks');


    }

    public $request;
    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }
    public function render()
    {

        return view('livewire.staff.surveyor.edit-customer-request');
    }
}
