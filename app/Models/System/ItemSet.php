<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;


class ItemSet extends Model
{

    protected $fillable = [
        'item_id',
        'individual_item_id',    
        'quantity',    
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function individual_item()
    {
        return $this->belongsTo(Item::class, 'individual_item_id');
    }
 
    public function relation_item()
    {
        return $this->belongsTo(Item::class, 'individual_item_id');
    }

}