<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table='munipicios';
    protected $fillable = [
        'nombre_mmunicipio','departamento_id','id'

    ];
    protected $hidden= [
        'created_at',
        'updated_at',
    ];
}
