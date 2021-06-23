<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentMail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_mail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_id');
            $table->date('date')->nullable();
            $table->date('period')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->boolean('main')->default(false);

            $table->foreign('send_id')->references('id')->on('send_notifications');
            $table->foreign('client_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_mail');
    }
}
