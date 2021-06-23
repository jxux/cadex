<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetractionType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_detraction_types";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'active',
        'percentage',
        'operation_type_id',
        'description',
    ];

}