<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'name','under','isgroup','level','description','active',
        'rate','unit','brand','model','size','keyfield',
        'create_by','create_at','update_by','update_at','delete_by','delete_at'
    ];
}
