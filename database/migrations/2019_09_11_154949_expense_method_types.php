<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ExpenseMethodTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_method_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('has_card')->default(false);  
        });

        
        DB::table('expense_method_types')->insert([
            ['id' => '1', 'description' => 'Caja chica'          , 'has_card' => false],
            ['id' => '2', 'description' => 'Tarjeta de crédito', 'has_card' => true],
            ['id' => '3', 'description' => 'Tarjeta de débito',  'has_card' => true],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_method_types');        
    }
}
