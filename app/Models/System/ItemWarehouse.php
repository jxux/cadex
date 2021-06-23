<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;


class ItemWarehouse extends Model
{ 
    protected $table = 'item_warehouse';

    protected $fillable = [
        'item_id',
        'warehouse_id', 
        'stock', 
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}