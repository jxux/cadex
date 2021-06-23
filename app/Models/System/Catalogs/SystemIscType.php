<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemIscType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_system_isc_types";
    public $incrementing = false;
}