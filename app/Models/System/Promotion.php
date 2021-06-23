<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Promotion extends Model
{
   // protected $table = 'pr';
  
    protected $fillable = [
        'type',
        'description',
        'name',
        'status',
        'image',
        'item_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 1);
        });
    }

   
}