<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_document_types";
    public $incrementing = false;
}