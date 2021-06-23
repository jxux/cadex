<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerceptionType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_perception_types";
    public $incrementing = false;
}