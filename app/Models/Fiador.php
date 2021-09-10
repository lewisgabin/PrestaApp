<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiador extends Model
{
    use HasFactory;
    protected $table = 'fiador';
    protected $fillable = [
        'nombre',
        'apellido',
        'apodo',
        'cedula',
        'direccion',
        'telefono',
        'id_cliente',
        'celular'
      
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
      }
}
