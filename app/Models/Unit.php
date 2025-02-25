<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unidad_habitacional';

    protected $primaryKey = 'unidad_habitacional_id';

    protected $fillable = [
        'departamento_id',
        'proyecto_id',
        'manzano',
        'lote',
        'observaciones',
        'estado_reg',
        'usuario_reg',
        'fecha_reg'
    ];
}
