<?php

namespace App\Http\Livewire\Lgo;

use App\Models\ConnectionRequest;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ViewConnectionRequest extends Component
{
    public $state = [];
    public $checked = false;
    public $request;

    public $action;

    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function getAction($action){
        $this->action = $action;
    }

    public function saveChanges(){

        Validator::make([
            'state' => $this->state
        ],
         [
            'state.action' => 'required',
        ],
        [
            'state.action.required' => 'Tafadhali chukua hatua kwanza!',
        ]) ->validate();

        if($this->action == 'Rejected'){
            ConnectionRequest::where('id', $this->request->id)
                            ->update([
                                'lgoStatus' => $this->state['action'],
                                'lgoNote' => $this->state['note'],
                                'dawasaStatus' => 'Rejected'
                            ]);
        } else {
            ConnectionRequest::where('id', $this->request->id)
                            ->update([
                                'lgoStatus' => $this->state['action'],
                                'lgoNote' => NULL,
                                'dawasaStatus' => 'Pending'
                            ]);
        }

        session()->flash('success', 'Action submitted successfully!');

        return redirect()->route('lgo.listrequests');
    }
    public function render()
    {
        return view('livewire.lgo.view-connection-request');
    }
}
