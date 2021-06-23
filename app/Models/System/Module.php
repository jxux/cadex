<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Modules\LevelAccess\Models\ModuleLevel;

class Module extends Model
{
    

    protected $with = ['levels'];

    protected $fillable = [
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function levels()
    {
        return $this->hasMany(ModuleLevel::class);
    }
}