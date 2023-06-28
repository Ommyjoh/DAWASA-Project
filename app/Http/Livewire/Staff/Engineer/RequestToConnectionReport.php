<?php

namespace App\Http\Livewire\Staff\Engineer;

use App\Models\ConnectionRequest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestToConnectionReport extends Component
{

    public $filter = 'all';

    public function updatedFilter()
    {
        $this->render();
    }
    public function render()
    {
        $query = ConnectionRequest::select('*', DB::raw('DATEDIFF(connApproveDate, created_at) AS numDays'))
            ->where('isConnected', 'Yes');

            if ($this->filter !== 'all') {
                if ($this->filter === 'excellent') {
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [1, 7]);
                } elseif ($this->filter === 'good') {
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [8, 10]);
                } elseif ($this->filter === 'medium') {
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [11, 15]);
                } elseif ($this->filter === 'poor') {
                    $query->where(DB::raw('DATEDIFF(connApproveDate, created_at)'), '>', 16);
                }
            }

        $requests = $query->latest()->get();

        // dd($requests);
        return view('livewire.staff.engineer.request-to-connection-report', [
            'requests' => $requests
        ]);
    }
}
