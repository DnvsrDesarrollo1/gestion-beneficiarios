<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'proyecto_id';
    protected $filiable = [
        'departamento_id',
        'nombre_proy',
        'subprograma',
        'num_acta',
        'fecha_aprobacion',
        'cant_uh',
        'estado_proy',
        'modalidad',
        'fecha_ini_obra',
        'fecha_fin_obra',
        'viviends_conclui',
        'componente',
        'provincia',
        'municipio',
        'direccion',
        'latitud',
        'longitud',
        'anio_relevamiento',
        'encargado_proy',
        'estado_reg',
        'usuario_reg',
        'fecha_reg',
        'updated_at'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departamento_id', 'departamento_id');
    }
}
