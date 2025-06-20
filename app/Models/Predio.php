<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;

    protected $table = 'listado_predios';

    protected $fillable = [
        'propietario', 'clave',
        'latitud1', 'longitud1',
        'latitud2', 'longitud2',
        'latitud3', 'longitud3',
        'latitud4', 'longitud4',
        'hora_p1', 'hora_p2', 'hora_p3'
    ];
}

