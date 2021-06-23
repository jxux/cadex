<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelatedDocumentType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_related_document_types";
    public $incrementing = false;
}