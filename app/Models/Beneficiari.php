<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiari extends Model
{
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
        'fecha_reg',
    ];

    protected $guarded = ['created_at', 'updated_at'];

}
