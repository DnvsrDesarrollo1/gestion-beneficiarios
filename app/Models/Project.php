<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'proyectos';

    protected $primaryKey = 'proyecto_id';

    protected $fillable = [
        'departamento_id',
        'nombre_proy',
        'subprograma',
        'num_acta',
        'fecha_aprobacion',
        'cant_uh',
        'modalidad',
        'fecha_ini_obra',
        'fecha_fin_obra',
        'vivienda_conclui',
        'componente',
        'provincia',
        'municipio',
        'dirrecion',
        'latitud',
        'longitud',
        'anio_relevamiento',
        'encargado_proy',
        'estado_reg',
        'usuario_reg',
        'fecha_reg',
    ];


}
