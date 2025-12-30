<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model
{
    protected $fillable = ['country_id', 'name', 'image'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function travelFlights()
{
    return $this->hasMany(TravelFlight::class, 'origin')
        ->orWhere('destination', $this->id);
}
}