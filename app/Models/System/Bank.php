<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    

    protected $fillable = [
        'description',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('active', 1);
    //     });
    // }
}