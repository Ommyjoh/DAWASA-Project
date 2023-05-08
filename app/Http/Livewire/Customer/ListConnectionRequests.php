<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use Livewire\Component;

class ListConnectionRequests extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteRequest'];

    public $requestIdToDelete;

    public function requestDeleteConfirmation($requestId){
        $this->requestIdToDelete = $requestId;
        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deleteRequest(){
        $request = ConnectionRequest::findOrFail($this->requestIdToDelete);

        $request->delete();
        $this->dispatchBrowserEvent('userDeleted', ['message' => 'Request has been deleted successfully!']);
    }
    public function render()
    {
        $requests = ConnectionRequest::where('user_id', auth()->user()->id)->latest()->get();
        return view('livewire.customer.list-connection-requests', [
            'requests' => $requests
        ]);
    }
}
