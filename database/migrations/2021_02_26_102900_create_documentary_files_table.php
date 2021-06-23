<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentaryFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentary_files', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('documentary_document_id');
			$table->unsignedBigInteger('documentary_process_id');
			$table->unsignedBigInteger('number');
			$table->unsignedBigInteger('year');
			$table->string('invoice', 15);
			$table->string('date_register', 10);
			$table->string('time_register', 8);
			$table->unsignedBigInteger('person_id');
			$table->text('sender');
			$table->string('subject', 250);
			$table->string('attached_file', 250)->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();

            $table->foreign('documentary_document_id')->on('documentary_documents')->references('id')->onDelete('cascade');
            $table->foreign('documentary_process_id')->on('documentary_processes')->references('id')->onDelete('cascade');
            $table->foreign('person_id')->on('persons')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentary_files');
    }
}
