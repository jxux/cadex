<?php

namespace App\CoreJxux\Requests\Inputs\Common;
use App\Models\System\Binnacles_Category as CategoryModel;

class CategoryInput{
    public static function set($category_id){
        $category = CategoryModel::find($category_id);

        return [
            'code' => $category->code,
            'name' => $category->name,
        ];
    }
}
