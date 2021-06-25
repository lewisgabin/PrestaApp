<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolsPermisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols_permison', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_permiso');
            $table->foreign("id_permiso")
            ->references("id")
            ->on("permisos")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("id_rol")
            ->references("id")
            ->on("rols")
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
        Schema::dropIfExists('rols_permison');
    }
}
