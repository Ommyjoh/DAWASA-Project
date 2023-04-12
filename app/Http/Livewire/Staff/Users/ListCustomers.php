<?php

namespace App\Http\Livewire\Staff\Users;

use Livewire\Component;

class ListCustomers extends Component
{
    public function render()
    {
        return view('livewire.staff.users.list-customers')->layout('layouts.staff.base');
    }
}
