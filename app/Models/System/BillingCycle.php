<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class BillingCycle extends Model
{
    
    protected $fillable = [
        'date_time_start',
        'renew',
        'quantity_documents', 
    ];
    
 
}