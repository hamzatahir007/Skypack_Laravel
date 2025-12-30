<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryDetail extends Model
{
    protected $table = 'inquiry_detail';

    protected $fillable = [
        'inquiry_master_id',
        'item_id',
        'description',
        'qty',
        'unit',
        'rate',
        'amount',
    ];

    public function master()
    {
        return $this->belongsTo(InquiryMaster::class, 'inquiry_master_id');
    }

    public function item()
    {
        return $this->belongsTo(Inventory::class, 'item_id');
    }
}
