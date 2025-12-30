<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InquiryMaster extends Model
{
        use SoftDeletes; // Enables soft deletes

    protected $dates = ['deleted_at']; // Laravel will use this column

    protected $table = 'inquiry_master';

    protected $fillable = [
        'client_id',
        'travel_flight_id',
        'entry_date',
        'status',
        'remarks',
        'active',
        'delivery_address',
        'contact_person',
        'contact_no',
        'Qrcode',
         'delete_by',
        'deleted_at',
        'traveler_id',
    ];

    public function details()
    {
        return $this->hasMany(InquiryDetail::class, 'inquiry_master_id');
    }

    // optional relations (if you have these models)
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id');
    }

    public function traveler()
    {
        return $this->belongsTo(\App\Models\Traveler::class, 'traveler_id');
    }

    public function travelFlight()
    {
        return $this->belongsTo(\App\Models\TravelFlight::class, 'travel_flight_id');
    }
}
