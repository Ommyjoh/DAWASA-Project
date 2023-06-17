<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'connection_requests_id',
        'staff_id',
        'description',
        'qty',
        'unit',
        'amount',
        'invoiceNo',
        'engineerStatus',
        'engineerNote',
        'paymentStatus',
        'controlNumber'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function connectionRequest()
    {
        return $this->belongsTo(ConnectionRequest::class);
    }
}
