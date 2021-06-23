<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_lots', function (Blueprint $table) {

            $table->id();
            $table->string('series');
            $table->date('date');
            $table->unsignedBigInteger('item_id'); 
            $table->timestamps();

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
        Schema::dropIfExists('item_lots');
    }
}
