<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class ItemsRating extends Model
{
    protected $table = 'items_rating';

    protected $fillable = [
        'user_id',
        'item_id',
        'item_id',
        'value'
    ];

}