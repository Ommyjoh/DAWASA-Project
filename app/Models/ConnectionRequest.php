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
        'idLetter',
        'staff_id',
        'custCareApproveddate',
        'surveyorStatus',
        'jobTitle',
        'distance',
        'cordX',
        'cordY',
        'surveyorApprovedDate',
        'connApproveDate',
        'isConnected',
        'meterNo',
        'initialReading',
        'remarks',
        'connDays',
        'plumber',
        'meterSize',
        'Authorizer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lgo()
    {
        return $this->belongsTo(Lgo::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'connection_requests_id');
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y');
    }

    public function getConnApproveDateAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y');
    }

    public function getRemainingDaysAttribute()
{
    $updatedDate = Carbon::parse($this->custCareApproveddate);
    $today = Carbon::now();
    $remainingDays = $updatedDate->diffInDays($today);
    $daysPassed = max($remainingDays - 7, 0);

    return [
        'remainingDays' => max(7 - $remainingDays, 0),
        'daysPassed' => $daysPassed,
    ];
}

public function getSurveyorApprovedDateAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y');
    }
}
