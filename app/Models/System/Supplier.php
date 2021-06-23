<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;

class Supplier extends Model
{
    protected $with = ['identity_document_type', 'country', 'department', 'province', 'district'];
    protected $fillable = [
        'identity_document_type_id',
        'number',
        'name',
        'trade_name',
        'country_id',
        'department_id',
        'province_id',
        'district_id',
        'address',
        'email',
        'telephone',
    ];

    public function identity_document_type()
    {
        return $this->belongsTo(IdentityDocumentType::class, 'identity_document_type_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function getAddressFullAttribute()
    {
        $address = trim($this->address);
        $address = ($address === '-' || $address === '')?'':$address.' ,';
        if ($address === '') {
            return '';
        }
        return "{$address} {$this->department->description} - {$this->province->description} - {$this->district->description}";
    }
}