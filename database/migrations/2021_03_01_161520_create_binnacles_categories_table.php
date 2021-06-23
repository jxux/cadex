<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinnaclesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binnacles_categories', function (Blueprint $table) {
            $table->id();
            $table->char('code',5)->unique();
            $table->string('name', 150);
            $table->timestamps();
        });

        // DB::table('binnacles_categories')->insert([
        //     ['code' => '-', 'name' => 'Sin Categoría', 'created_at' => now()],
        //   ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binnacles_categories');
    }
}
