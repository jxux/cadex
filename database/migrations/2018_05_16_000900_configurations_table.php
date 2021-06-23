<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('trade_name')->nullable();
            $table->String('number');
            $table->char('country_id', 2);
            $table->char('department_id', 2)->nullable();
            $table->char('province_id', 4)->nullable();
            $table->char('district_id', 6)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->text('url_apiruc')->nullable();
            $table->text('token_apiruc')->nullable();
            $table->boolean('send_auto')->nullable();
            $table->double('uit', 6, 2)->nullable();
            $table->double('igv', 4, 2)->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
        });

        DB::table('configurations')->insert([
            'id' => '1',
            'name' => 'SigeMype',
            'number' => '2015357169',
            'country_id' => 'PE',
            'url_apiruc' => 'https://apiperu.dev',
            'token_apiruc' => '70f85ec059f51333b17d839511922d36da2f7f081905499aa94cdcc01fec86ec',
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
