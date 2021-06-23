<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacles_category extends Model{   
     
    use HasFactory;

    protected $table = 'binnacles_categories';
    protected $fillable = ['code', 'name'];

    //Relacion uno a uno
    public function Binnacles(){
        return $this->belongsto(Binnacle::class);
    }
}
