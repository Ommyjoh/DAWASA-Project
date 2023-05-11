<?php

namespace App\Http\Livewire\Staff\Users;

use App\Models\Lgo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListLgo extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteLgo'];

    public $lgoIdToDelete;
    public $state = [];
    public $selectedDistrict;

    public $lgoToEdit;

    public $searchTerm;
    public $showEditModal = false;

    public $Ilala = ['Buguruni', 'Chanika', 'Gerezani', 'Ilala', 'Jangwani', 'Kariakoo', 'Kisutu', 'Kitunda', 'Mchikichini', 'Msongola', 'Pugu', 'Segerea', 'Tabata', 'Ukonga', 'Upanga Magharibi', 'Upanga Mashariki'];
    public $Kinondoni = ['Bunju', 'Goba', 'Hananasif', 'Kawe', 'Kijitonyama', 'Kimara', 'Kinondoni', 'Kunduchi', 'Kwembe', 'Mabibo', 'Magomeni', 'Makongo', 'Makuburi', 'Manzese', 'Mbezi', 'Mikocheni', 'Msasani', 'Mwananyamala', 'Ndugumbi', 'Saranga', 'Sinza', 'Tandale'];
    public $Temeke = ['Azimio', 'Buza', 'Chamazi', 'Charambe', 'Keko', 'Kibada', 'Kiburugwa', 'Kigamboni', 'Kijichi', 'Kilakala', 'Kimanzichana', 'Kimbiji', 'Kisarawe II', 'Kurasini', 'Makangarawe', 'Mbagala', 'Mianzini', 'Miburani', 'Mjimwema', 'Mtoni', 'Pemba Mnazi', 'Sandali', 'Somangira', 'Tandika', 'Toangoma', 'Tungi', 'Vijibweni'];
    public $Ubungo = ['Goba', 'Kibamba', 'Kibangu', 'Kigogo', 'Kilimani', 'Kimara', 'Kinondoni', 'Kisasa', 'Kisiwani', 'Kisongo', 'Kivukoni', 'Mabibo', 'Magomeni', 'Makuburi', 'Makumbusho', 'Mburahati', 'Mikocheni', 'Mnazi Mmoja', 'Msewe', 'Msigani', 'Mwananyamala', 'Mzimuni', 'Ndugumbi', 'Sandali', 'Tandale', 'Ubungo'];
    public $Kigamboni = ['Kibada', 'Kibugumo', 'Kigamboni', 'Kigamboni Coastal', 'Kijichi', 'Kimbiji', 'Kisarawe II', 'Kurasini', 'Makangarawe', 'Mbagala', 'Mjimwema', 'Mtoni', 'Pemba Mnazi', 'Tungi', 'Vijibweni'];


    public function getDistrict($district){
        $this->selectedDistrict = $district;
    }

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
            'ward' => 'required',
            'street' => 'required',
            'messenger' => 'required',
            'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:lgos',
            'box' => 'required|numeric'
        ],
        [
            'district.required' => 'Please select district of LGO',
            'ward.required' => 'Please select ward of LGO',
            'street.required' => 'Please fill street of LGO',
            'messenger.required' => 'Please fill messenger name of LGO',
            'phone.required' => 'Please fill active phone number',
            'phone.regex' => 'Please start with 255 / check number length',
            'phone.unique' => 'This phone number has already taken!',
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
                        'ward' => 'required',
                        'street' => 'required',
                        'messenger' => 'required',
                        'phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:lgos,phone,' .$this->lgoToEdit->id,
                        'box' => 'required|numeric'
                    ],
                    [
                        'district.required' => 'Please select district of LGO',
                        'ward.required' => 'Please select ward of LGO',
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

    
    public function lgoDeleteConfirmation($lgoId){
        $this->lgoIdToDelete = $lgoId;
        $this->dispatchBrowserEvent('show-delete-confirmation');

    }

    public function deleteLgo(){
        $lgo = Lgo::findOrFail($this->lgoIdToDelete);

        $lgo->delete();
        $this->dispatchBrowserEvent('userDeleted', ['message' => 'Local Goverment Office has been deleted successfully!']);
    }

    public function render()
    {

        $kata = [];

        if($this->selectedDistrict=='Ilala'){
            $kata = $this->Ilala;
        } elseif($this->selectedDistrict=='Kinondoni'){
            $kata = $this->Kinondoni;
        } elseif($this->selectedDistrict=='Temeke'){
            $kata = $this->Temeke;
        } elseif($this->selectedDistrict=='Ubungo'){
            $kata = $this->Ubungo;
        } elseif($this->selectedDistrict=='Kigamboni'){
            $kata = $this->Kigamboni;
        } else {
            $kata = [];
        }
        
        $lgos = Lgo::query()
                    ->where('district', 'like', '%'. $this->searchTerm .'%')
                    ->orWhere('street', 'like', '%'. $this->searchTerm .'%')
                    ->orwhere('messenger', 'like', '%'. $this->searchTerm .'%')
                    ->orWhere('phone', 'like', '%'. $this->searchTerm .'%')
                    ->orwhere('ward', 'like', '%'. $this->searchTerm .'%')
                    ->orWhere('box', 'like', '%'. $this->searchTerm .'%')
                    ->latest()->get();
        return view('livewire.staff.users.list-lgo',[
            'lgos' => $lgos,
            'kata' => $kata
        ]);
    }
}
