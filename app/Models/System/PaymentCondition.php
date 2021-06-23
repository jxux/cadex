<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class PaymentCondition extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'days',
        'is_locked',
        'is_active',
    ];
}
