<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use App\Models\System\{
    DocumentPayment,
    SaleNotePayment,
    PurchasePayment
};
use Modules\Sale\Models\QuotationPayment;
use Modules\Sale\Models\ContractPayment;
use Modules\Finance\Models\IncomePayment;
use Modules\Pos\Models\CashTransaction;
use Modules\Sale\Models\TechnicalServicePayment;

class PaymentMethodType extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'description',
        'has_card',
        'charge',
        'number_days',
    ];


    public function document_payments()
    {
        return $this->hasMany(DocumentPayment::class,  'payment_method_type_id');
    }
    
    public function sale_note_payments()
    {
        return $this->hasMany(SaleNotePayment::class,  'payment_method_type_id');
    }
    
    public function purchase_payments()
    {
        return $this->hasMany(PurchasePayment::class,  'payment_method_type_id');
    }

    public function quotation_payments()
    {
        return $this->hasMany(QuotationPayment::class,  'payment_method_type_id');
    }
    
    public function contract_payments()
    {
        return $this->hasMany(ContractPayment::class,  'payment_method_type_id');
    }
    
    public function income_payments()
    {
        return $this->hasMany(IncomePayment::class,  'payment_method_type_id');
    }
    
    public function cash_transactions()
    {
        return $this->hasMany(CashTransaction::class,  'payment_method_type_id');
    }
    
    public function technical_service_payments()
    {
        return $this->hasMany(TechnicalServicePayment::class,  'payment_method_type_id');
    }

    
    public function scopeWhereFilterPayments($query, $params)
    {

        return $query->with(['document_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser();
                        });
                },
                'sale_note_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser()
                                ->whereNotChanged();
                        });
                },
                'quotation_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser()
                                ->whereNotChanged();
                        });
                },
                'contract_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser()
                                ->whereNotChanged();
                        });
                },
                'purchase_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser();
                        });
                },
                'income_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereStateTypeAccepted()->whereTypeUser();
                        });
                },
                'cash_transactions' => function($q) use($params){
                    $q->whereBetween('date', [$params->date_start, $params->date_end]);
                },
                'technical_service_payments' => function($q) use($params){
                    $q->whereBetween('date_of_payment', [$params->date_start, $params->date_end])
                        ->whereHas('associated_record_payment', function($p){
                            $p->whereTypeUser();
                        });
                }
                ]);

    }
}