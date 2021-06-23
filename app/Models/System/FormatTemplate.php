<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class FormatTemplate extends Model
{
    

    protected $fillable = [
    	'id',
    	'formats'
    ];
}
