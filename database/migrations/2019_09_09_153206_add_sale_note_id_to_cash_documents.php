<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaleNoteIdToCashDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    {

        Schema::table('cash_documents', function (Blueprint $table) {

            $table->unsignedBigInteger('sale_note_id')->nullable()->after('document_id');
            $table->foreign('sale_note_id')->references('id')->on('sale_notes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cash_documents', function (Blueprint $table) {

            $table->dropForeign(['sale_note_id']);
            $table->dropColumn('sale_note_id');  

        });
    }
}
