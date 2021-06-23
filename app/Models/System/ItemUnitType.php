<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\AffectationIgvType;
use App\Models\System\Catalogs\CurrencyType;
use App\Models\System\Catalogs\SystemIscType;
use App\Models\System\Catalogs\UnitType;

class ItemUnitType extends Model
{
     protected $with = ['unit_type'];
    public $timestamps = false;
    
    protected $fillable = [
        'description',
        'item_id',
        'unit_type_id',
        'quantity_unit',
        'price1',
        'price2',
        'price3',
        'price_default',
    ];
    
    public function unit_type() {
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }
    
    public function item() {
        return $this->belongsTo(Item::class);
    }
 
}