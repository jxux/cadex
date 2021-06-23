<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
 
use Modules\Expense\Models\Expense;
use Modules\Expense\Models\ExpensePayment;

class CashDocument extends Model
{
    // protected $with = ['document'];

    public $timestamps = false;
    
    protected $fillable = [
        'cash_id',
        'document_id',  
        'sale_note_id',  
        // 'purchase_id',  
        // 'expense_id',  
        'expense_payment_id',  
    ];
 

  
    public function cash()
    {
        return $this->belongsTo(Cash::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function sale_note()
    {
        return $this->belongsTo(SaleNote::class);
    }
 
    public function expense_payment()
    {
        return $this->belongsTo(ExpensePayment::class);
    }

    // public function purchase()
    // {
    //     return $this->belongsTo(Purchase::class);
    // }
 
    // public function expense()
    // {
    //     return $this->belongsTo(Expense::class);
    // }
 
}