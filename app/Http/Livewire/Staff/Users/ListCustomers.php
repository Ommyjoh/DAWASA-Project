<?php

namespace App\Http\Livewire\Staff\Users;

use App\Models\User;
use Livewire\Component;

class ListCustomers extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteCustomer'];
    public $customerIdToDelete;

    public $searchTerm;

    public function customerDeleteConfirmation($customerId){
        $this->customerIdToDelete = $customerId;
        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deleteCustomer(){
        $customer = User::findOrFail($this->customerIdToDelete);

        $customer->delete();
        $this->dispatchBrowserEvent('userDeleted', ['message' => 'Customer has been deleted successfully!']);
    }

    public function render()
    {
        $customers = User::query()
                            ->where('name', 'like', '%'. $this->searchTerm .'%')
                            ->orWhere('phone', 'like', '%'. $this->searchTerm .'%')
                            ->latest()->paginate();
        return view('livewire.staff.users.list-customers', [
            'customers' => $customers
        ]);
    }
}
