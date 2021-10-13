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
        'id_sector',
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

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }

    public function fiador() {
        return $this->hasOne(Fiador::class, 'id_cliente');
    }

    public function referencia() {
        return $this->hasMany(Referencias::class, 'idCliente');
    }
}
