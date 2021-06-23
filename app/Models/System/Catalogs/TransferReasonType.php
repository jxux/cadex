<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferReasonType extends ModelCatalog{

    use HasFactory;

    protected $table = "cat_transfer_reason_types";
    public $incrementing = false;
}