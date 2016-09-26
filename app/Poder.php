<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poder extends Model
{
    protected $fillable = [
            'fecha',
            'poderante',
            'dni',
            'direccion',
            'localidad',
            'demandado',
            'aseguradora',
            'fecha_siniestro',
            'dominio_siniestro',
            'direccion_siniestro',
            'localidad_siniestro'
    ];
}
