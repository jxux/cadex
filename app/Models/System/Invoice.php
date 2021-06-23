<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\OperationType;

class Invoice extends Model
{
    protected $with = ['operation_type'];
    public $timestamps = false;

    protected $fillable = [
        'document_id',
        'operation_type_id',
        'date_of_due',
    ];

    protected $casts = [
        'date_of_due' => 'date',
    ];

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function operation_type()
    {
        return $this->belongsTo(OperationType::class, 'operation_type_id');
    }
}