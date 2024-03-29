<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListSurveyorRequests extends Component
{
    public function render()
    {

        $connections = ConnectionRequest::where('staff_id', auth('staff')->user()->id)
                    ->where('surveyorStatus', 'Pending')
                    ->latest()
                    ->get();
                    
        return view('livewire.staff.surveyor.list-surveyor-requests', [
            'connections' => $connections
        ]);
    }
}
