<?php

namespace App\Http\Livewire\Customer;

use App\Models\Lgo;
use Livewire\Component;

class CreateRequest extends Component
{

    public $selectedDistrict, $selectedWard, $selectedStreet;

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
