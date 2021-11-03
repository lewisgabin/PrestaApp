<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamos extends Model
{
    use HasFactory;
     protected $table = 'detalle_prestamos';

     protected $fillaable = [
    'numeroCuota',
     'fecha',
     'interes',
     'capital',
     'cuota',
     'capitalRestante',
     'estado',
     'pagada',
     'abono',
     'idPrestamos'


     ];

     public function prestamos()
     {
         return $this->belongsTo(Prestamos::class, 'idPrestamos');
     }


}
