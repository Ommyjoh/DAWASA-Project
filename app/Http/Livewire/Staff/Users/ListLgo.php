<?php

namespace App\Http\Livewire\Staff\Users;

use Livewire\Component;

class ListLgo extends Component
{

    public function addNew(){
        dd("Here");
    }
    public function render()
    {
        return view('livewire.staff.users.list-lgo');
    }
}
