<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DispatchItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dispatch_id');
            $table->unsignedBigInteger('item_id');
            $table->json('item');
            $table->decimal('quantity', 12, 4);

            $table->foreign('dispatch_id')->references('id')->on('dispatches')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_items');
    }
}
