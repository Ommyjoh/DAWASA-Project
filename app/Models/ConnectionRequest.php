<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lgo_id',
        'fullName',
        'occupation',
        'nationality',
        'phone',
        'connReason',
        'servRequired',
        'district',
        'ward',
        'street',
        'house',
        'plot',
        'passport',
        'idCard',
        'lgoStatus',
        'dawasaStatus',
        'lgoNote',
        'dawasaNote',
    ];
}
