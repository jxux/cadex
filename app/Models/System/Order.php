<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\System\StatusOrder;


class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'customer',
        'shipping_address',
        'items',
        'total',
        'reference_payment',
        'document_external_id',
        'number_document',
        'status_order_id',
        'purchase'
    ];

    protected $casts = [
        'customer' => 'object',
        'items' => 'object',
        'purchase' => 'object'
    ];

    public function status_order()
    {
        return $this->belongsTo(StatusOrder::class);
    }


}
