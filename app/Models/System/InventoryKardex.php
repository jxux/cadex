<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class InventoryKardex extends Model
{
    protected $table = 'inventory_kardex';

    protected $fillable = [ 
        'date_of_issue',
        'item_id',
        'inventory_kardexable_id',
        'inventory_kardexable_type',
        'warehouse_id',
        'quantity', 
    ];
 

    public function inventory_kardexable()
    {
        return $this->morphTo();
    }
     

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}