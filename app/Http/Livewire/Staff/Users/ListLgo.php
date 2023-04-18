<?php

namespace App\Http\Livewire\Staff\Users;

use App\Models\Lgo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListLgo extends Component
{
    public $state = [];

    public $lgoToEdit;
    public $showEditModal = false;

    public function addNewLgoForm(){

        $this->showEditModal = true;
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }

    public function generatePassword(){
        $number = 0;
        $number++;

        $password = 'DAWASA-' . str_pad($number, 4, '0', STR_PAD_LEFT);
        $encryptedPassword = Hash::make($password);
        
        return $encryptedPassword;

    }

    public function addLgo(){

        Validator::make($this->state, [
            'district' => 'required',
            'street' => 'required',
            'messenger' => 'required',
            'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:lgos',
            'box' => 'required|numeric'
        ],
        [
            'district.required' => 'Please fill district of LGO',
            'street.required' => 'Please fill street of LGO',
            'messenger.required' => 'Please fill messenger name of LGO',
            'phone.required' => 'Please fill active phone number',
            'phone.regex' => 'Please start with 255 / check number length',
            'box.required' => 'Please fill LGO P.O BOX'
        ])->validate();
        $this->state['password'] = $this->generatePassword();
        Lgo::create($this->state);

        session()->flash('message', $this->state['street'] .'-Local Government Office Was Added Successfully!');

        $this->dispatchBrowserEvent('hide-form');
        
    }

    public function editLgo(Lgo $lgo){

        $this->showEditModal = true;
        $this->lgoToEdit = $lgo;
        $this->state = $lgo->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function editLgoData(){
        $validatedData = Validator::make($this->state, [
                        'district' => 'required',
                        'street' => 'required',
                        'messenger' => 'required',
                        'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:lgos,phone,' .$this->lgoToEdit->id,
                        'box' => 'required|numeric'
                    ],
                    [
                        'district.required' => 'Please fill district of LGO',
                        'street.required' => 'Please fill street of LGO',
                        'messenger.required' => 'Please fill messenger name of LGO',
                        'phone.required' => 'Please fill active phone number',
                        'phone.regex' => 'Please start with 255 / check number length',
                        'box.required' => 'Please fill LGO P.O BOX'
                    ])->validate();

        $this->lgoToEdit->update($validatedData);
        session()->flash('message', $this->state['street'] .' - Local Government Office Was Updated Successfully!');

        $this->dispatchBrowserEvent('hide-form');
        
    }

    public function render()
    {
        $lgos = Lgo::latest()->paginate();
        return view('livewire.staff.users.list-lgo',[
            'lgos' => $lgos
        ]);
    }
}
