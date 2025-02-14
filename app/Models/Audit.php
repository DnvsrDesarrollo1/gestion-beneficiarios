<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'vauditoria';
    public $timestamps = false;

    protected $primaryKey = 'audit_id';

    protected $fillable = [
        'nombre_tabla',
        'campo_modific',
        'valor_anterior_campo',
        'valor_actual_campo',
        'usuario_id',
        'fechahora',
        'registro_modifi',
    ];

    public function user()
    {
        return $this->belongsTo(User2::class, 'user_id', '')->from('users');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'departamento_id', 'departamento_id')->from('departamentos');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id')->from('proyectos');
    }


}
