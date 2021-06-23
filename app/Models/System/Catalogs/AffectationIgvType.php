<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffectationIgvType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_affectation_igv_types";
    public $incrementing = false;
}