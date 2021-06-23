<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemWarehouseTable extends Migration
{
    public function up()
    {
        Schema::create('item_warehouse', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->decimal('stock', 12, 4);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_warehouse');
    }
}
