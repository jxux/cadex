<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payments', function (Blueprint $table) {

            $table->id();
            $table->date('date_of_payment');
            $table->date('date_of_payment_real')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->unsignedBigInteger('payment_method_type_id')->nullable();
            $table->boolean('has_card')->default(false);
            $table->unsignedBigInteger('card_brand_id')->nullable();
            $table->string('reference')->nullable();
            $table->decimal('payment', 12, 2);
            $table->boolean('state')->default(false);
            $table->string('reference_payment')->nullable();
            $table->timestamps();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_payments');
    }
}
