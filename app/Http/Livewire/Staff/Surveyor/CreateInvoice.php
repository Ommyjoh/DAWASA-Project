<?php

namespace App\Http\Livewire\Staff\Surveyor;

use App\Models\ConnectionRequest;
use App\Models\Invoice;
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
        $this->items[] = ['description' => '', 'rate' => '', 'qty' => '', 'unit' => '', 'amount' => ''];
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

    public function saveInvoice()
    {

        // dd($this->request->staff_id);
        foreach ($this->items as $item) {
            Invoice::create([
                'user_id' => $this->request->user_id,
                'description' => $item['description'],
                'qty' => $item['qty'],
                'amount' => $item['amount'],
                'unit' => $item['unit'],
                'connection_requests_id' => $this->request->id,
                'staff_id' => $this->request->staff_id,
            ]);
        }

        session()->flash('success', 'Action submitted successfully!');

        return redirect()->route('surveyor.allinvoices');
    
    }
    public function render()
    {
        
        return view('livewire.staff.surveyor.create-invoice');
    }
}
