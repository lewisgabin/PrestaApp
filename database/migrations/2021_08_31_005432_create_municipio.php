<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_provincia');
            $table->foreign("id_provincia")
            ->references("id")
            ->on("provincia")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExist('municipio');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('municipio');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
