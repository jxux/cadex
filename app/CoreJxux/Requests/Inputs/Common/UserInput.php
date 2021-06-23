<?php

namespace App\CoreJxux\Requests\Inputs\Common;
use App\Models\System\User as UserModel;

class UserInput{
    public static function set($user_id){
        $usuario = UserModel::find($user_id);
        return [
            'id' => $usuario->id,
            'name' => $usuario->name,
            'nick_name' => $usuario->nick_name,
            'email' => $usuario->email,
            'type' => $usuario->type
        ];
    }
}
