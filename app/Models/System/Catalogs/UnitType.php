<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_unit_types";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'active',
        'symbol',
        'description',
    ];

    public function item_unit_types(){
        return $this->hasMany(ItemUnitType::class);
    }
}