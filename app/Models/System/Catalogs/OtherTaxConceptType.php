<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtherTaxConceptType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_other_tax_concept_types";
    public $incrementing = false;
}