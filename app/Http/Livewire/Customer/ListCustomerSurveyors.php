<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListCustomerSurveyors extends Component
{
    public function render()
    {

        $surveyors = ConnectionRequest::where('user_id', auth()->user()->id)
                    ->where('dawasaStatus', 'Approved')
                    ->latest()
                    ->get();

        return view('livewire.customer.list-customer-surveyors', [
            'surveyors' => $surveyors
        ]);
    }
}
