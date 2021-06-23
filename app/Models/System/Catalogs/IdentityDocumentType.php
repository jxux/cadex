<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityDocumentType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_identity_document_types";
    public $incrementing = false;
}