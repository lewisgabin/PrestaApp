<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'ruta';
    public $timestamps = false;

    public function prestamos()
    {
        return $this->hasMany(Prestamos::class,'idRuta');
    }

}
