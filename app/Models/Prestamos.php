<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;
    protected $fillable=[
     'monto',
     'numeroCuota',
     'porcentajeTasa',
     'frecuencia',
     'amortizacion',
     'moraLuego',
     'moraDiaria',
     'prestamosViejo',
     'tipoGarantia',
     'gastoCierre',
     'pagoMinimo',
     'tipoPagoMinimo',
     'porcentajePagoMinimo',
     'estado',
     'comentario',
     'progreso',
     'saldo',
     'idCliente',
     'idGarante',
     'idCartera',
     'idRuta'

    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'idCliente');
    }

    public function garante()
    {
        return $this->belongsTo(Cliente::class, 'idGarante');
    }

    public function cartera()
    {
        return $this->belongsTo(Cartera::class,'idCartera');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class,'idRuta');
    }

    public function detallePrestamos()
    {
        return $this->hasMany(DetallePrestamos::class, 'idPrestamos');
    }


}
