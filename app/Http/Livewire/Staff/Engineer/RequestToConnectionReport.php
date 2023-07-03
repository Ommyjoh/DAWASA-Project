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
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [1, 20]);
                } elseif ($this->filter === 'good') {
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [21, 25]);
                } elseif ($this->filter === 'medium') {
                    $query->whereBetween(DB::raw('DATEDIFF(connApproveDate, created_at)'), [26, 30]);
                } elseif ($this->filter === 'poor') {
                    $query->where(DB::raw('DATEDIFF(connApproveDate, created_at)'), '>', 30);
                }
            }

        $requests = $query->latest()->get();

        // dd($requests);
        return view('livewire.staff.engineer.request-to-connection-report', [
            'requests' => $requests
        ]);
    }
}
