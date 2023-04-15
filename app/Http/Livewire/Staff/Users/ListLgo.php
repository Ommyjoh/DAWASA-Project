<?php

namespace App\Http\Livewire\Staff\Users;

use Livewire\Component;

class ListLgo extends Component
{
    public $state = [];

    public function addNewLgoForm(){
        $this->dispatchBrowserEvent('show-form');
    }

    public function addLgo(){
        dd($this->state);
    }

    public function render()
    {
        return view('livewire.staff.users.list-lgo');
    }
}
