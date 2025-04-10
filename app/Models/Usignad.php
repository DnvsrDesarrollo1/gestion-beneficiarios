<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usignad extends Model
{
    protected $table = 'uh_asignada';
    protected $primaryKey = 'uh_asignada_id';
    protected $fillable = [
        'departamento_id',
        'proyecto_id',
        'unidad_habitacional_id',
        'beneficiario_id',
        'observaciones',
        'estado_reg',
        'usuario_reg',
        'created_at',
        'updated_at'

    ];
    // Relación con Beneficiario (Un Beneficiario tiene una unidad asignada)
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiario_id', 'beneficiario_id');
    }

    // Relación con Estado Social
    public function social()
    {
        return $this->hasOne(Social::class, 'uh_asignada_id', 'uh_asignada_id');
    }

    // Relación con Información Legal
    public function legal()
    {
        return $this->hasOne(Legal::class, 'uh_asignada_id', 'uh_asignada_id');
    }

    // Relación con Créditos
    public function credit()
    {
        return $this->hasOne(Credit::class, 'uh_asignada_id', 'uh_asignada_id');
    }

}
