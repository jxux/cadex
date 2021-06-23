<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelatedTaxDocumentType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_related_tax_document_types";
    public $incrementing = false;
}