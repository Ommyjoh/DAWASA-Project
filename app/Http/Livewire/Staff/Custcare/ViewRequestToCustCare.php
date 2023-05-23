<?php

namespace App\Http\Livewire\Staff\Custcare;

use App\Models\ConnectionRequest;
use App\Models\Staff;
use Livewire\Component;

class ViewRequestToCustCare extends Component
{

    public $request, $action;
    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function getAction($action){
        $this->action = $action;
    }
    public function render()
    {

        $surveyors = Staff::where('role', 'Surveyor')
                            ->where('office', $this->request->district)
                            ->latest()
                            ->get();  

        return view('livewire.staff.custcare.view-request-to-cust-care', [
            'surveyors' => $surveyors
        ]);
    }
}
