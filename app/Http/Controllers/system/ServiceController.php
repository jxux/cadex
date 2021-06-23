<?php

namespace App\Http\Controllers\system;

use Illuminate\Routing\Controller;
use App\CoreJxux\Data\ServiceData;

class ServiceController extends Controller{

    public function service($type, $number){
        return ServiceData::service($type, $number);
    }
}
