<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\Province;

class Warehouse extends Model
{
    protected $fillable = [
        'establishment_id',
        'description',
    ];


    public function inventory_kardex()
    {
        return $this->hasMany(InventoryKardex::class);
    }
    
}