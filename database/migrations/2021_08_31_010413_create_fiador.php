<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiador', function (Blueprint $table) {
            $table->id(); //joelia    
            $table->string('nombre');    
            $table->string('apellidos');           
            $table->string('apodo')->nullable();  
            $table->string('cedula')->nullable();  
            $table->text('direccion')->nullable();     
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable(); 
            $table->timestamps();  

            $table->foreign("id_cliente")
            ->references("id")
            ->on("cliente")
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
        Schema::dropIfExists('fiador');
    }
}
