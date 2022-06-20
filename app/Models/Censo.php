<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    protected $table='censos';
    protected $fillable = [
        'id','persona_id','municipio_id'

    ];
    protected $hidden= [
        'created_at',
        'updated_at',
    ];
}
