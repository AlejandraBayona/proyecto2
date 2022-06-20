<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";
    protected $fillable = [
        'id','nombres', 'apellidos' ,'fecha_nacimiento','dui', 'estado_civil',
    ];
    protected $hidden= [
        'created_at',
        'updated_at',
    ];
}
