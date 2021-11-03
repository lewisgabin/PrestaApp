<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = 'sector';
    public $timestamps = false;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
    
}
