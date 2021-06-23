<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Commentary extends Model
{
    use HasFactory;

    use HasProfilePhoto;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    // protected $fillable = ['body', 'valoration'];

    //Relacion uno a muchos inversa
    public function post(){
        return $this->belongsto(Post::class);
    }

}
