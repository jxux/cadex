<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacles_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'name',
    ];
}
