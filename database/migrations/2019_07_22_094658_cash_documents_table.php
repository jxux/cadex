<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    {
        
        Schema::create('cash_documents', function (Blueprint $table) {
           
            $table->id(); 
            $table->unsignedBigInteger('cash_id');
            $table->unsignedBigInteger('document_id')->nullable(); 
 
            $table->foreign('cash_id')->references('id')->on('cash')->onDelete('cascade'); 
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_documents');                
        //
    }
}
