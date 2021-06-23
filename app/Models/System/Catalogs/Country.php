<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends ModelCatalog{

    use HasFactory;
    
    public $incrementing = false;
    public $timestamps = false;
}