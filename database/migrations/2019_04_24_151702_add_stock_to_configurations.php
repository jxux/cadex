<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockToConfigurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('configurations', function(Blueprint $table) {
            $table->boolean('stock')->default(true)->after('cron');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('configurations', function(Blueprint $table) {
            $table->dropColumn('stock');
        });
    }
}
