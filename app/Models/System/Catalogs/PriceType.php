<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_price_types";
    public $incrementing = false;
}