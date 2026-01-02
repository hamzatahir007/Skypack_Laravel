<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelerBankAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'traveler_id',
        'bank_name',
        'account_title',
        'account_number',
        'iban',
        'swift_code',
    ];

    public function traveler()
    {
        return $this->belongsTo(Traveler::class);
    }

    
}
