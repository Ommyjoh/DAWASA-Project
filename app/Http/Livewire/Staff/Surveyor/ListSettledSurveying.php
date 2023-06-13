<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListSettledSurveying extends Component
{
    public function render()
    {

        $connections = ConnectionRequest::where('staff_id', auth('staff')->user()->id)
                        ->where(function ($query) {
                            $query->where('surveyorStatus', 'Approved')
                                ->orWhere('surveyorStatus', 'Rejected');
                        })
                        ->latest()
                        ->get();

                    
        return view('livewire.staff.surveyor.list-settled-surveying', [
            'connections' => $connections
        ]);
    }
}
