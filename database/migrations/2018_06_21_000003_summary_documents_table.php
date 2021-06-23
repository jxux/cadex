<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SummaryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('summary_id');
            $table->unsignedBigInteger('document_id');
            $table->string('description')->nullable();

            $table->foreign('summary_id')->references('id')->on('summaries')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary_documents');
    }
}
