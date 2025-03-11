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

    public function department()
    {
       return $this->belongsTo(Department::class, 'departamento_id', 'departamento_id')->from('departamentos');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'proyecto_id', 'proyecto_id')->from('proyectos');
    }
}
