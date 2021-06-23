<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;


class CardBrand extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'description',        
        'id',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('active', 1);
    //     });
    // }
}