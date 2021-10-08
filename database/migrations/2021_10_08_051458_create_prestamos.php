<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
          
            $table->double('monto', 8, 2); 
            $table->integer('numeroCuota'); 
            $table->double('porcentajeTasa', 8, 5);
            $table->string('frecuencia');
            $table->integer('amortizacion'); 
            $table->integer('moraLuego'); 
            $table->double('moraDiaria',8,4); 
            $table->boolean('prestamosViejo');
            $table->string('tipoGarantia')->nullable();
            $table->double('gastoCierre', 8, 2)->nullable(); 
            $table->boolean('pagoMinimo');
            $table->enum('tipoPagoMinimo', ['Interes', 'Capital'])->nullable();
            $table->double('porcentajePagoMinimo', 8, 2)->nullable(); 
            $table->boolean('estado');
            $table->longText('comentario');
            $table->enum('progreso', ['Pagado', 'Pendiente','Anulado','Atrasado']);
            $table->double('saldo',8,2); 
            $table->unsignedBigInteger('idCliente'); 
            $table->foreign("idCliente")
            ->references("id")
            ->on("cliente")
            ->onDelete("cascade");
            $table->unsignedBigInteger('idGarante')->nullable(); 
            $table->foreign("idGarante")
            ->references("id")
            ->on("cliente")
            ->onDelete("cascade");
            $table->unsignedBigInteger('idCartera')->nullable(); 
            $table->foreign("idCartera")
            ->references("id")
            ->on("cartera")
            ->onDelete("cascade");
            $table->unsignedBigInteger('idRuta'); 
            $table->foreign("idRuta")
            ->references("id")
            ->on("ruta")
            ->onDelete("cascade")
            ->onUpdate("cascade");



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
        Schema::dropIfExists('prestamos');
    }
}
