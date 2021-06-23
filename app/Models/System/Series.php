<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

use App\Models\System\Catalogs\DocumentType;
use Modules\Document\Models\SeriesConfiguration;

class Series extends Model
{
    protected $table = 'series';
    
    protected $fillable = [
        'establishment_id',
        'document_type_id',
        'number',
        'contingency',
    ];
    
    public function establishment() {
        return $this->belongsTo(Establishment::class);
    }
    
    public function document_type() {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }
    
    public function setNumberAttribute($value) {
        $this->attributes['number'] = strtoupper($value);
    }
    
    public function documents() {
        return $this->hasMany(Document::class, 'series', 'number');
    }

    public function series_configurations()
    {
        return $this->hasOne(SeriesConfiguration::class);
    }

 

}