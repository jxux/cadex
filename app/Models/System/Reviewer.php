<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos inversa
    public function binnacles(){
        return $this->belongsto(Binnacle::class);
    }

    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
