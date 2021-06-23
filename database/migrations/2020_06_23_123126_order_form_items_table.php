<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderFormItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_form_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_form_id');
            $table->unsignedBigInteger('item_id');
            $table->json('item');
            $table->decimal('quantity', 12, 4);

            $table->foreign('order_form_id')->references('id')->on('order_forms')->onDelete('cascade');
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
        Schema::dropIfExists('order_form_items');
    }
}
