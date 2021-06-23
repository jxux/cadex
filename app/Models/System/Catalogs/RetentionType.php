<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RetentionType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_retention_types";
    public $incrementing = false;
}