<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;


class ExchangeRate extends Model
{
    

    protected $fillable = [
        'date',
        'date_original',
        'purchase',
        'purchase_original',
        'sale',
        'sale_original',
    ];
}