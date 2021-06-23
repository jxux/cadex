<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegendType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_legend_types";
    public $incrementing = false;
}