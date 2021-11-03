<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    use HasFactory;
    protected $table = 'cartera';
    protected $fillable = [
        'nombre',
        'comentario',
        'saldo',



    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamos::class,'idCartera');
    }

}
