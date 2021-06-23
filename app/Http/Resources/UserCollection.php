<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        return $this->collection->transform(function($row, $key) {
            return [
                'id' => $row->id,
                'nick_name' => $row->nick_name,
                'name' => $row->name,
                'email' => $row->email,
                'dni' => $row->dni,
                // 'enabled' => (bool) $row->enabled,
                // 'created_at' => $row->created_at->format('Y-m-d H:i:s'),
                // 'updated_at' => $row->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }
}
