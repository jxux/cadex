<?php

namespace App\CoreJxux\Requests\Inputs\Common;
use App\Models\System\Binnacles_Service as ServiceModel;

class ServiceInput{
    public static function set($service_id){
        $service = ServiceModel::find($service_id);

        return [
            'code' => $service->code,
            'name' => $service->name,
        ];
    }
}
