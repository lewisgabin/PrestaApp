<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cliente';
    protected $fillable = [
        'nombre',
        'apellido',
        'apodo',
        'cedula',
        'fecha_nacimiento',
        'ocupacion',
        'nacionalidad',
        'sexo',
        'whatsapp',
        'tel_principal',
        'tel_otro',
        'email',
        'direccion',
        'id_provincia',
        'id_municipio',
        'sector',
        'id_ruta',
        'direccion_trabajo',
        'foto',
        'recomendado_por',
        'comentario',
        'estado',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
}
