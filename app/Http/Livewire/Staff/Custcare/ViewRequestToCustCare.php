<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ViewRequestToCustCare extends Component
{
    public $state = [];
    public $request, $action;

    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function getAction($action){
        $this->action = $action;
    }


    public function saveChanges(){

        if($this->action == 'Rejected') {
            Validator::make([
            'state' => $this->state
        ],
        [
            'state.action' => 'required',
            'state.note' => 'required'
        ],
        [
            'state.action.required' => 'Please choose action',
            'state.note.required' => 'Please state reason for request rejection',
        ]) ->validate();

         ConnectionRequest::where('id', $this->request->id)
                        ->update([
                            'dawasaStatus' => $this->state['action'],
                            'dawasaNote' => $this->state['note'],
                            'staff_id' => NULL
                        ]);

        } elseif($this->action == 'Approved'){

            Validator::make([
                'state' => $this->state
            ],
            [
                'state.action' => 'required',
                'state.surveyor' => 'required',
            ],
            [
                'state.action.required' => 'Please choose action',
                'state.surveyor.required' => 'Please assign surveyor to this request',
            ]) ->validate();
    
             ConnectionRequest::where('id', $this->request->id)
                            ->update([
                                'dawasaStatus' => $this->state['action'],
                                'staff_id' => $this->state['surveyor'],
                                'dawasaNote' => NULL,
                                'custCareApproveddate' => Carbon::now()
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
        }

    session()->flash('success', 'Action submitted successfully!');

    return redirect()->route('custcare.allrequests');
    }
    public function render()
    {

        $surveyors = Staff::withCount('connectionRequests')
                    ->where('role', 'Surveyor')
                    ->where('office', $this->request->district)
                    ->orderBy('connection_requests_count', 'asc')
                    ->get();
    


        return view('livewire.staff.custcare.view-request-to-cust-care', [
            'surveyors' => $surveyors
        ]);
    }
}
