<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanningResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request){

        return [
            'id' => $this->id,
            // 'user_id' => $this->user_id,
            // 'external_id' => $this->external_id,
            'date' => $this->date->format('Y-m-d'),
            'start_time' => $this->start_time->format('H:i'),
            'end_time' => $this->end_time->format('H:i'),
            'hour' => $this->hour,
            'client_id' => $this->client_id,
            // 'client' => $this->client,
            'category_id' => $this->category_id,
            'period' => $this->period->format('Y-m'),
            'service_id' => $this->service_id,
            'description' => $this->description,
            'status' => $this->status,
            // 'date_re' => $this->$date_re->format('Y-m-d'),
            // 'date_re' => $date_re,// ($this->date_re) ? $this->$date_re->format('Y-m-d'):$this->$date_re,
            // 'description_re' => $this->description_re,
            // 'status_re' => $this->status_re,
        ];
    }
}
