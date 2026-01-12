<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelFlight extends Model
{
    use SoftDeletes; // Enables soft deletes

    // Table name (optional if it follows Laravel convention)
    protected $table = 'travel_flights';
    protected $dates = ['deleted_at']; // Laravel will use this column

    protected $fillable = [
        'traveler_id',
        'pnr_no',
        'flight_date',
        'origin',
        'origin_date_time',
        'destination',
        'destination_date_time',
        'status',
        'active',
        'ticket_pic',
        'weight',
        'rate_per_unit',
        'total',
        'keyfield',
        'Qrcode',
        'create_by',
        'update_by',
        'delete_by',
        'deleted_at'
    ];
    
    protected $casts = [
        'flight_date' => 'datetime',
        'origin_date_time' => 'datetime',
        'destination_date_time' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function traveler()
    {
        return $this->belongsTo(Traveler::class, 'traveler_id');
    }

    public function cityOrigin()
    {
        return $this->belongsTo(City::class, 'origin');
    }

    public function cityDestination()
    {
        return $this->belongsTo(City::class, 'destination');
    }
}
