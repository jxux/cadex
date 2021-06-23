<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncomeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');  
            $table->string('description');  
            $table->decimal('total', 12, 2); 
            $table->foreign('income_id')->references('id')->on('income')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_items');
    }
}
