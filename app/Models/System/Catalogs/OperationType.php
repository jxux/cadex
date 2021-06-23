<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperationType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_operation_types";
    public $incrementing = false;
}