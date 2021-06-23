<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SummaryStatusType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_summary_status_types";
    public $incrementing = false;
}