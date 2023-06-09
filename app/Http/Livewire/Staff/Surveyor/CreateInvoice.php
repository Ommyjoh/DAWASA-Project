<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $request;

    public $items = [
        ['description' => '', 'rate' => '', 'qty' => '', 'unit' => '', 'amount' => ''],
    ];
    public function mount(ConnectionRequest $request){
        $this->request = $request;
    }

    public function addItem()
    {
        $this->items[] = ['description' => '', 'rate' => ''];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function updatedItems()
    {
        foreach ($this->items as $index => $item) {
            if (!empty($item['qty']) && !empty($item['rate'])) {
                $amount = $item['qty'] * $item['rate'];
                $this->items[$index]['amount'] = $amount;
            }
        }
    }
    public function render()
    {
        
        return view('livewire.staff.surveyor.create-invoice');
    }
}
