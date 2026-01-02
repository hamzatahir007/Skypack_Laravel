<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'inquiry_id','travel_flight_id',
        'sender_id','sender_type',
        'receiver_id','receiver_type',
        'title','description','image','read_at'
    ];

    public function inquiry() {
        return $this->belongsTo(InquiryMaster::class);
    }

    public function sender()
    {
            return $this->morphTo();

        // return $this->sender_type === 'client'
        //     ? $this->belongsTo(Client::class, 'sender_id')
        //     : $this->belongsTo(Traveler::class, 'sender_id');
    }

    public function receiver()
    {
            return $this->morphTo();

        // return $this->receiver_type === 'client'
        //     ? $this->belongsTo(Client::class, 'receiver_id')
        //     : $this->belongsTo(Traveler::class, 'receiver_id');
    }
}
