<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoteCreditType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_note_credit_types";
    public $incrementing = false;
}