<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencias extends Model
{
    use HasFactory;
    protected $table = 'referencias';
    protected $fillable = [
        'nombre',
        'apellidos',
        'direccion',
        'idCliente',
        'celular',
        'parentesco'

      
    ];

    public function clienteRef() {
        return $this->belongsTo(Cliente::class, 'idCliente');
      }
}
