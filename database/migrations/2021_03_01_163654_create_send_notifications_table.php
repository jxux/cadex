<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('send_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('user');
            $table->date('date')->nullable();
            $table->date('period');
            $table->unsignedBigInteger('client_id');
            $table->json('client');
            $table->enum('type', ['tributario', 'planilla', 'otros'])->nullable();
            $table->unsignedBigInteger('format_id');
            $table->boolean('enabled')->default(true);
            $table->index('enabled');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('persons');
            $table->foreign('format_id')->references('id')->on('models_mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('send_notifications');
            // $table->foreign('user_id')->references('id')->on('users');

    }
}
