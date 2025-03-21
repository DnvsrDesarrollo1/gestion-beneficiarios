<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiarios';

    protected $primaryKey = 'beneficiario_id';

    protected $fillable = [
        'beneficiario_cod',
        'cedula_identidad',
        'extension_ci',
        'complemento_ci',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'apellido_casada',
        'sexo',
        'fecha_nacimiento',
        'telefono',
        'tipo',
        'estado_reg',
        'usuario_reg',
        'fecha_reg',
        'departamento',
        'user_id'
    ];

    protected $guarded = ['created_at', 'updated_at'];

    public function spouse()
    {
        return $this->hasOne(Spouse::class, 'beneficiario_id', 'beneficiario_id');
    }
    // Relación inversa con Usignad (UhAsignada)
    public function usignad()
    {
        return $this->hasOne(Usignad::class, 'beneficiario_id', 'beneficiario_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unidad_habitacional_id', 'unidad_habitacional_id');
    }

    public function department()
    {
       return $this->belongsTo(Department::class, 'departamento_id', 'departamento_id')->from('departamentos');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'proyecto_id', 'proyecto_id')->from('proyectos');
    }


}
