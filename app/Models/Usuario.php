<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'usuario',
        'apellido',
        'rol',
        'image',
        'estado'
    ];
}
