<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{

    protected $fillable = [
        'item_id',
        'image',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
