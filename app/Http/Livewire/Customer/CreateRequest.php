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

    public $passport, $idCard, $idLetter;
    public $checked = false;

    public function saveRequest(){
        
        Validator::make([
            'passport' =>$this->passport,
            'idCard' => $this->idCard,
            'state' => $this->state,
            'idLetter' => $this->idLetter
        ],
        [
            'passport'=> 'required|file|image|max:1024',
            'idCard' => 'required|file|image|max:1024',
            'idLetter'=>'required|file|image|max:1024',
            'state.connReason' => 'required',
            'state.servRequired' => 'required',
            'state.fullName' => 'required',
            'state.occupation' => 'required',
            'state.nationality' => 'required',
            'state.phone' => 'required|numeric|regex:/^255\d{9}$/|digits:12|unique:connection_requests,phone',
            'state.district' => 'required',
            'state.ward' => 'required',
            'state.lgoId' => 'required',
            'state.street' => 'required',
            'state.house' => 'required',
            'state.plot' => 'required|numeric',
            'state.mjumbe' => 'required'
        ],
        [
            'passport.required' => 'Please attach applicant passport size',
            'passport.image' => 'Please attach image format only',
            'passport.max' => 'Image must not be exceed 1gb',
            'idCard.required' => 'Please attach applicant identity card',
            'idCard.image' => 'Please attach image format only',
            'idCard.max' => 'Image must not be exceed 1gb',
            'idLetter.required' => 'Please attach applicant identification letter',
            'idLetter.image' => 'Please attach image format only',
            'idLetter.max' => 'Image must not be exceed 1gb',
            'state.connReason.required' => 'Please select connection reason',
            'state.servRequired.required' => 'Please select service required',
            'state.fullName.required' => 'Please select applicant full name',
            'state.occupation.required' => 'Please select applicant occupation',
            'state.nationality.required' => 'Please select applicant nationality',
            'state.phone.required' => 'Please select applicant phone number',
            'state.phone.numeric' => 'Invalid phone number',
            'state.phone.regex' => 'Please start with 255 / check number length',
            'state.phone.unique' => 'This phone number has already taken!',
            'state.district.required' => 'Please select applicant district',
            'state.ward.required' => 'Please select applicant ward',
            'state.lgoId.required' => 'Please select applicant LGO chairperson',
            'state.street.required' => 'Please select applicant street',
            'state.house.required' => 'Please fill applicant house name or number',
            'state.plot.required' => 'Please fill applicant plot number',
            'state.plot.numeric' => 'Invalid plot number',
            'state.mjumbe.required' => 'Please fill applicant messenger name',
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
            'mjumbe'=>$this->state['mjumbe'],
            'idLetter' => $this->idLetter->store('/', 'idLetters'),
        ]);

        session()->flash('success', 'Your connection request has been submitted successfully!');

        return redirect()->route('customer.listrequests');
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
