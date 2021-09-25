<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table = 'provincia';

    public function cliente()
    {
        return $this->hasMany(Cliente::class, 'id_provincia');
    }
}
