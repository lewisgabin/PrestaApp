<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('provincia');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('provincia');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
