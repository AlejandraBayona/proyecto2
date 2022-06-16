<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    protected $fillable = [
        'nombre', 
        'apellido',
        'fecha_nacimiento',
        'dui', 
        'estado_civil'
    ];
}
