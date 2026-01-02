<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traveler extends Model
{
    use HasFactory;
    use SoftDeletes; // Enables soft deletes

    // Table name (optional if it follows Laravel convention)
    protected $table = 'travelers';
    protected $dates = ['deleted_at']; // Laravel will use this column

    // Mass assignable fields
    protected $fillable = [
        'full_name',
        'country',
        'email',
        'mobile_number',
        'mobile_number_2',
        'address',
        'city',
        'password',
        'passport_expiry',
        'passport_no',
        'ID_number',
        'profession',
        'gender',
        'passport_pic',
        'profile_image',
        'create_by',
        'update_by',
        'delete_by',
        'deleted_at',
        'active'
    ];

    // Hidden fields for arrays/JSON
    protected $hidden = [
        'password',
    ];

    // Mutator to automatically hash password when set
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function bankAccount()
    {
        return $this->hasOne(\App\Models\TravelerBankAccount::class);
    }
}
