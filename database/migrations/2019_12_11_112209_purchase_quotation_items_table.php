<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_quotation_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_quotation_id');
            $table->unsignedBigInteger('item_id');
            $table->json('item');
            $table->decimal('quantity',12,4); 
 
            $table->foreign('purchase_quotation_id')->references('id')->on('purchase_quotations')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_quotation_items');
        
    }
}
