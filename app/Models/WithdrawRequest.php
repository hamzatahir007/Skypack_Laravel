<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WithdrawRequest extends Model
{
    use SoftDeletes; // Enables soft deletes
    protected $dates = ['deleted_at']; // Laravel will use this column

    protected $fillable = [
        'inquiry_master_id',
        'traveler_id',
        'amount',
        'status',
        'screenshot',
    ];

    public function inquiry_master()
    {
        return $this->belongsTo(InquiryMaster::class, 'inquiry_master_id');
    }

    public function traveler()
    {
        return $this->belongsTo(Traveler::class, 'traveler_id');
    }

    public function travelFlight()
    {
        return $this->belongsTo(TravelFlight::class, 'travel_flight_id');
    }
}
