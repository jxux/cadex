<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinnaclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binnacles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('hour')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('category_id');
            $table->date('period');
            $table->unsignedBigInteger('service_id');
            $table->text('description')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('reviewer_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('persons');
            $table->foreign('category_id')->references('id')->on('binnacles_categories');
            $table->foreign('service_id')->references('id')->on('binnacles_services');
            $table->foreign('reviewer_id')->references('id')->on('reviewers');

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
        Schema::dropIfExists('binnacles');
    }
}
