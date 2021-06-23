<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request){
        return [
            'id' => $this->id,
            'type' => $this->type,
            'identity_document_type_id' => $this->identity_document_type_id,
            'dni' => $this->dni,
            'name' => $this->name,
            'sex' => $this->sex,
            'date_birth' => $this->date_birth,
            'nick_name' => $this->nick_name,
            'country_id' => $this->country_id,
            'department_id' => $this->department_id,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'address' => $this->address,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'roles' => collect($this->roles)->transform(function ($row) {
                return [
                    $row->id,
                ];
            }),
            'addresses' => collect($this->addresses)->transform(function ($row) {
                return [
                    'id' => $row->id,
                    'trade_name' => $row->trade_name,
                    'country_id' => $row->country_id,
                    'location_id' => !is_null($row->location_id)?$row->location_id:[],
                    'address' => $row->address,
                    'phone' => $row->phone,
                    'email' => $row->email,
                    'main' => (bool)$row->main,
                ];
            }),

            // 'more_address' =>  $this->more_address,
        ];
    }
}
