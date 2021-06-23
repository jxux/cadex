<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportModeType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_transport_mode_types";
    public $incrementing = false;
}