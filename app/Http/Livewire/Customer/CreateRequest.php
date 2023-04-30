<?php

namespace App\Http\Livewire\Customer;

use App\Models\ConnectionRequest;
use App\Models\Lgo;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRequest extends Component
{

    use WithFileUploads;

    public $selectedDistrict, $selectedWard, $selectedStreet;
    public $state = [];

    public $passport, $idCard;
    public $checked = false;

    public function saveRequest(){
        
        Validator::make([
            'passport' =>$this->passport,
            'idCard' => $this->idCard,
            'state' => $this->state,
        ],
        [
            'passport'=> 'required',
            'idCard' => 'required',
            'state.connReason' => 'required',
        ])->validate();

        ConnectionRequest::create([
            'user_id' => auth()->user()->id ,
            'lgo_id' => $this->state['lgoId'],
            'fullName' => $this->state['fullName'],
            'occupation' => $this->state['occupation'],
            'nationality' => $this->state['nationality'],
            'phone' => $this->state['phone'],
            'connReason' => $this->state['connReason'],
            'servRequired' => $this->state['servRequired'],
            'district' => $this->state['district'],
            'ward' => $this->state['ward'],
            'street' => $this->state['street'],
            'house' => $this->state['house'],
            'plot' => $this->state['plot'],
            'passport' => $this->passport->store('/', 'passports'),
            'idCard' => $this->idCard->store('/', 'cards'),
            'lgoStatus' => "Pending",
            'dawasaStatus' => "Pending",
        ]);

        dd('Done');
    }

    public $Ilala = ['Buguruni', 'Chanika', 'Gerezani', 'Ilala', 'Jangwani', 'Kariakoo', 'Kisutu', 'Kitunda', 'Mchikichini', 'Msongola', 'Pugu', 'Segerea', 'Tabata', 'Ukonga', 'Upanga Magharibi', 'Upanga Mashariki'];
    public $Kinondoni = ['Bunju', 'Goba', 'Hananasif', 'Kawe', 'Kijitonyama', 'Kimara', 'Kinondoni', 'Kunduchi', 'Kwembe', 'Mabibo', 'Magomeni', 'Makongo', 'Makuburi', 'Manzese', 'Mbezi', 'Mikocheni', 'Msasani', 'Mwananyamala', 'Ndugumbi', 'Saranga', 'Sinza', 'Tandale'];
    public $Temeke = ['Azimio', 'Buza', 'Chamazi', 'Charambe', 'Keko', 'Kibada', 'Kiburugwa', 'Kigamboni', 'Kijichi', 'Kilakala', 'Kimanzichana', 'Kimbiji', 'Kisarawe II', 'Kurasini', 'Makangarawe', 'Mbagala', 'Mianzini', 'Miburani', 'Mjimwema', 'Mtoni', 'Pemba Mnazi', 'Sandali', 'Somangira', 'Tandika', 'Toangoma', 'Tungi', 'Vijibweni'];
    public $Ubungo = ['Goba', 'Kibamba', 'Kibangu', 'Kigogo', 'Kilimani', 'Kimara', 'Kinondoni', 'Kisasa', 'Kisiwani', 'Kisongo', 'Kivukoni', 'Mabibo', 'Magomeni', 'Makuburi', 'Makumbusho', 'Mburahati', 'Mikocheni', 'Mnazi Mmoja', 'Msewe', 'Msigani', 'Mwananyamala', 'Mzimuni', 'Ndugumbi', 'Sandali', 'Tandale', 'Ubungo'];
    public $Kigamboni = ['Kibada', 'Kibugumo', 'Kigamboni', 'Kigamboni Coastal', 'Kijichi', 'Kimbiji', 'Kisarawe II', 'Kurasini', 'Makangarawe', 'Mbagala', 'Mjimwema', 'Mtoni', 'Pemba Mnazi', 'Tungi', 'Vijibweni'];


    public function getDistrict($district){
        $this->selectedDistrict = $district;
    }

    public function getWard($ward){
        $this->selectedWard = $ward;
    }

    public function getStreet($street){
        $this->selectedStreet = $street;
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
        return view('livewire.customer.create-request', [
            'kata' => $kata,
            'lgos' => Lgo::where('ward', $this->selectedWard)->latest()->get(),
            'lgos2' => Lgo::where('ward', '=', $this->selectedWard)->where('street', '=', $this->selectedStreet)->latest()->get()
        ]);
    }
}
