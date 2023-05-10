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
        
        if($this->action == 'Rejected') {
                Validator::make([
                'state' => $this->state
            ],
            [
                'state.action' => 'required',
                'state.note' => 'required'
            ],
            [
                'state.action.required' => 'Tafadhali chukua hatua kwanza!',
                'state.note.required' => 'Tafadhali jaza sababu ya kukataa ombi hili',
            ]) ->validate();

             ConnectionRequest::where('id', $this->request->id)
                            ->update([
                                'lgoStatus' => $this->state['action'],
                                'lgoNote' => $this->state['note'],
                                'dawasaStatus' => 'Rejected'
                            ]);
        } else {

                Validator::make([
                'state' => $this->state
            ],
            [
                'state.action' => 'required',
            ],
            [
                'state.action.required' => 'Tafadhali chukua hatua kwanza!',
            ]) ->validate();

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
