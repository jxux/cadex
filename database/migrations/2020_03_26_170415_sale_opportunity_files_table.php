<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaleOpportunityFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_opportunity_files', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('sale_opportunity_id'); 
            $table->string('filename');
            $table->foreign('sale_opportunity_id')->references('id')->on('sale_opportunities')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_opportunity_files');
        
    }
}
