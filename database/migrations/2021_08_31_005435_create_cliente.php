<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('apodo')->nullable();
            $table->string('cedula')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('nacionalidad');
            $table->string('sexo');
            $table->string('whatsapp');
            $table->string('tel_principal')->nullable();
            $table->string('tel_otro')->nullable()->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('direccion')->nullable();
            $table->unsignedBigInteger('id_provincia')->nullable();
            $table->unsignedBigInteger('id_municipio')->nullable();
            $table->string('sector')->nullable();
            $table->unsignedBigInteger('id_ruta')->nullable();
            $table->string('direccion_trabajo')->nullable();
            $table->string('foto')->nullable();
            $table->string('recomendado_por')->nullable();
            $table->text('comentario')->nullable();
            $table->timestamps();
            $table->boolean('estado');

            $table->foreign("id_provincia")
            ->references("id")
            ->on("provincia")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("id_municipio")
            ->references("id")
            ->on("municipio")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("id_ruta")
            ->references("id")
            ->on("ruta")
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
        Schema::dropIfExists('cliente');
    }
}
