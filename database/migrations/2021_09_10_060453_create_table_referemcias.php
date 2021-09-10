<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReferemcias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');    
            $table->string('apellidos'); 
            $table->text('direccion')->nullable();     
            $table->string('telefono')->nullable();
            $table->string('parentesco');
            $table->unsignedBigInteger('idCliente')->nullable(); 
            $table->foreign("idCliente")
            ->references("id")
            ->on("cliente")
            ->onDelete("cascade");
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencias');
    }
}
