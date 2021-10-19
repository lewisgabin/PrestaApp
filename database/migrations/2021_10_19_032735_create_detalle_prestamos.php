<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_prestamos', function (Blueprint $table) {
            $table->id();
            $table->string('numeroCuota');
            $table->date('fecha');
            $table->double('interes');
            $table->double('capital');
            $table->double('cuota');
            $table->double('capitalRestante');
            $table->boolean('estado');
            $table->boolean('pagada');
            $table->boolean('abono');
            $table->unsignedBigInteger('idPrestamos')->nullable(); 
            $table->foreign("idPrestamos")
            ->references("id")
            ->on("prestamos")
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
        Schema::dropIfExists('detalle_prestamos');
    }
}
