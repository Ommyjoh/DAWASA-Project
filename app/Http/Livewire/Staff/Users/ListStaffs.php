<?php

namespace App\Http\Livewire\Staff\Users;

use App\Models\Staff;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListStaffs extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteStaff'];
    public $state = [];

    public $staffIdToDelete;

    public $staffToEdit;

    public $showEditModal = false;

    public $searchTerm;

    public function addNewStaffForm(){
        
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
    public function addStaff(){
        Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'office' => 'required',
            'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:staff',
        ],
        [
            'name.required' => 'Please fill staff name',
            'email.required' => 'Please fill staff email address',
            'email.email' => 'Please fill correct email address',
            'role.required' => 'Please select staff role',
            'phone.required' => 'Please fill active phone number',
            'phone.regex' => 'Please start with 255 / check number length',
            'phone.unique' => 'This phone number has already taken!',
            'office.required' => 'Please select staff office',
        ])->validate();

        $this->state['password'] = $this->generatePassword();
        Staff::create($this->state);

        session()->flash('message', 'Staff Was Added Successfully!');

        $this->dispatchBrowserEvent('hide-form');

    }

    public function editStaff(Staff $staff){

        $this->showEditModal = true;
        $this->staffToEdit = $staff;
        $this->state = $staff->toArray();
        $this->staffIdToDelete = $staff->id;
        $this->dispatchBrowserEvent('show-form');
    }


    public function editStaffData(){
        $validatedData = Validator::make($this->state, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'role' => 'required',
                        'office' => 'required',
                        'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:staff,phone,' .$this->staffToEdit->id,
                    ],
                    [
                        'name.required' => 'Please fill staff name',
                        'email.required' => 'Please fill staff email address',
                        'email.email' => 'Please fill correct email address',
                        'role.required' => 'Please select staff role',
                        'phone.required' => 'Please fill active phone number',
                        'phone.regex' => 'Please start with 255 / check number length',
                        'phone.unique' => 'This phone number has already taken!',
                        'office.required' => 'Please select office',
                    ])->validate();
                    
        $staff = Staff::findOrFail($this->staffIdToDelete);

        $staffs =  Staff::whereRole('Admin')->get();

        if($validatedData['role'] != 'Admin'){
            if(count($staffs) <= 1 && $staff->role == 'Admin'){
                session()->flash('errorMessage', 'You can not change this Admin\'s role!');
                $this->dispatchBrowserEvent('hide-form');
                return back();
            }
        }

        $this->staffToEdit->update($validatedData);
        session()->flash('message', 'Staff Was Updated Successfully!');

        $this->dispatchBrowserEvent('hide-form');
        
    }

    public function staffDeleteConfirmation($staffId){
        $this->staffIdToDelete = $staffId;
        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deleteStaff(){
 
        $staff = Staff::findOrFail($this->staffIdToDelete);

        $staffs =  Staff::whereRole('Admin')->get();

        if(count($staffs) <= 1 && $staff->role == 'Admin'){
            session()->flash('errorMessage', 'You can not delete this Admin!');
            return back();
        }

        $staff->delete();
        $this->dispatchBrowserEvent('userDeleted', ['message' => 'Staff has been deleted successfully!']);
    }
    public function render()
    {
        $staffs = Staff::query()
                        ->where('name', 'like', '%'. $this->searchTerm .'%')
                        ->orWhere('office', 'like', '%'. $this->searchTerm .'%')
                        ->orWhere('role', 'like', '%'. $this->searchTerm .'%')
                        ->orWhere('email', 'like', '%'. $this->searchTerm .'%')
                        ->orWhere('phone', 'like', '%'. $this->searchTerm .'%')
                        ->orderByRaw("
                        CASE 
                            WHEN role = 'Admin' THEN 1 
                            WHEN role = 'Manager' THEN 2 
                            WHEN role = 'Engineer' THEN 3 
                            WHEN role = 'Surveyor' THEN 4 
                            WHEN role = 'customer Care' THEN 5 
                            ELSE 6 
                        END
                    ")
                            ->orderBy('created_at', 'desc')
                            ->get();
       
        return view('livewire.staff.users.list-staffs', [
            'staffs' => $staffs
        ]);
    }
}
