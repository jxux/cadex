<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('kardex', function (Blueprint $table) {

            $table->id();
            $table->date('date_of_issue');
            $table->enum('type', ['sale', 'purchase']);
            
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->unsignedBigInteger('purchase_id')->nullable(); 
            $table->integer('quantity');  
 
            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('kardex');
    }
}
