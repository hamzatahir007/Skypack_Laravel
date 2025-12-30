<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    protected $fillable = ['name', 'image'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function travelFlights()
{
    return $this->hasManyThrough(
        \App\Models\TravelFlight::class, // Final model
        \App\Models\City::class,         // Intermediate model
        'country_id',                     // Foreign key on cities table
        'origin',                         // Foreign key on travel_flights table
        'id',                             // Local key on countries table
        'id'                              // Local key on cities table
    );
}

}
