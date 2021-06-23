<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GlobalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_payments', function (Blueprint $table) {

            $table->id();
            $table->char('soap_type_id', 2);

            $table->integer('destination_id')->nullable();
            $table->string('destination_type');

            $table->integer('payment_id');
            $table->string('payment_type');

            $table->index(['destination_id','destination_type'],'destination_index');
            $table->index(['payment_id','payment_type'],'payment_index');
            $table->foreign('soap_type_id')->references('id')->on('soap_types');

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('global_payments');
    }
}
