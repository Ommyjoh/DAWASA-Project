<?php

namespace App\Models;

use Carbon\Carbon;
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
        'mjumbe',
        'idLetter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lgo()
    {
        return $this->belongsTo(Lgo::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y');
    }
}
