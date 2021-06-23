<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BinnacleCollection extends ResourceCollection{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        return $this->collection->transform(function($row, $key) {

            $date_re = '';

            if($row->date_re){
                $date_re = $row->date_re->format('d/m/Y');
            }else{
                $date_re = 'Sin revision';
            }
            
            return [
                'id' => $row->id,
                'user_id' => $row->user_id,
                // 'user' => $row->user->name,
                'date'=> $row->date->format('d/m/Y'),
                'start_time'=> $row->start_time->format('h:i a'),
                'end_time'=> $row->end_time->format('h:i a'),
                'hour'=> $row->hour,
                'client'=> $row->client->name,
                // 'client_id',
                // 'category_id'=> $row->category_id,
                'category' => $row->category->name,
                'service' => $row->service->name,
                'period' => $row->period->format('M/Y'),
                // 'service_id',
                'description' => $row->description,
                'status'=> $row->status,

                'date_re'=> $date_re,//->format('d/m/Y'),
                'description_re' => $row->description_re,
                'status_re'=> $row->status_re,
                // 'code' => $row->code,
                // 'number' => $row->number,
                // 'name' => $row->name,
                'created_at' => $row->created_at->format('Y-m-d h:i a'),
                // 'updated_at' => $row->updated_at->format('Y-m-d h:i:s'),
            ];
        });
    }
}
