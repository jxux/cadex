<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;
use Illuminate\Database\Eloquent\Builder;


class Person extends Model
{
    protected $table = 'persons';
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
        'perception_agent',
        'state',
        'condition',
        'percentage_perception',
        'person_type_id',
        'comment',
        'enabled',
        'contact',
        'internal_code',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('status', 1);
    //     });
    // }

    public function addresses(){
        return $this->hasMany(PersonAddress::class);
    }
    public function identity_document_type(){
        return $this->belongsTo(IdentityDocumentType::class, 'identity_document_type_id');
    }

    public function documents(){
        return $this->hasMany(Document::class, 'customer_id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function scopeWhereType($query, $type){
        return $query->where('type', $type);
    }

    public function getAddressFullAttribute(){
        $address = trim($this->address);
        $address = ($address === '-' || $address === '')?'':$address.' ,';
        if ($address === '') {
            return '';
        }
        return "{$address} {$this->department->description} - {$this->province->description} - {$this->district->description}";
    }

    public function more_address(){
        return $this->hasMany(PersonAddress::class);
    }

    public function person_type(){
        return $this->belongsTo(PersonType::class);
    }

    public function scopeWhereIsEnabled($query){
        return $query->where('enabled', true);
    }

    public function getContactAttribute($value){
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setContactAttribute($value)   {
        $this->attributes['contact'] = (is_null($value))?null:json_encode($value);
    }

    //Relacion uno a uno
    public function Binnacles(){
        return $this->belongsto(Binnacle::class);
    }
}
