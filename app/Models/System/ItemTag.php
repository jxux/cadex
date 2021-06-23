<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use App\Models\System\Catalogs\Tag;



class ItemTag extends Model
{ 
    protected $table = 'item_tags';

    protected $with = ['tag'];

    protected $fillable = [
        'item_id',
        'tag_id', 
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

   
}