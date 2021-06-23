<?php

namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoteDebitType extends ModelCatalog{

    use HasFactory;
    
    protected $table = "cat_note_debit_types";
    public $incrementing = false;
}