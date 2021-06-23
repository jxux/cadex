<?php
namespace App\Models\System\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ModelCatalog extends Model{

    use HasFactory;

    public function scopeWhereActive($query){
        return $query->where('active', true);
    }

    public function scopeOrderByDescription($query){
        return $query->orderBy('description');
    }
}