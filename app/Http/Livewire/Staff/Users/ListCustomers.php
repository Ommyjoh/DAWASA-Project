<?php

namespace App\Http\Livewire\Staff\Users;

use App\Models\User;
use Livewire\Component;

class ListCustomers extends Component
{
    public function render()
    {
        $customers = User::latest()->paginate();
        return view('livewire.staff.users.list-customers', [
            'customers' => $customers
        ]);
    }
}
