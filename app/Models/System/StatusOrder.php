<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use App\Models\System\Order;

class StatusOrder extends Model
{
  public function order()
  {
      return $this->hasMany(Order::class);
  }
}
