<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName(){
        return "slug";        
    }

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsto(User::class);
    }

    public function category(){
        return $this->belongsto(Category::class);
    }

    //Relacion muchos a muchos
    public function tags(){
        return $this->belongstoMany(Tag::class);
    }

    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }


    //Relacion uno a muchos
    public function Commentaries(){
        return $this->hasMany(Commentary::class);
    }
}
