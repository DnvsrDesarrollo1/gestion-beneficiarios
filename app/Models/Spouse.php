<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $table = 'conyugues';
    protected $primaryKey = '';
    protected $fillable = [
        'beneficiario_id',
        'beneficiario_conyu_id',
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
        'estado_reg',
        'usuario_reg',
        'fecha_reg'
    ];

    // Relación con el beneficiario
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiario_id', 'beneficiario_id');
    }

    // Relación con el conyugue (beneficiario también)
    public function spouse()
    {
        //return $this->hasOne(Spouse::class, 'beneficiario_id', 'beneficiario_id');
        return $this->belongsTo(Beneficiary::class, 'beneficiario_conyu_id', 'beneficiario_id');
    }


}
