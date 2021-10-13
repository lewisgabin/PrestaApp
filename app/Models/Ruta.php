<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'ruta';
    public $timestamps = false;

    // public function cliente()
    // {
    //     return $this->hasMany(Cliente::class, 'id_ruta');
    // }
}
