<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraCredito extends Model
{
    protected $table = 'extracreditos';

    protected $primaryKey = 'id_cred';

    protected $fillable = [
        'unid_hab_id',
        'codigo_credito',
        'ci',
        'entidad_financiera',
        'nombre_beneficiario',
        'proyecto',
        'subprograma',
        'tasa_interes',
        'tasa_seguro_desgravamen',
        'sexo',
        'fono',
        'fecha_nacimiento',
        'monto_total_credito',
        'monto_migrado_idepro',
        'factor_ajuste',
        'capital_migrado',
        'interes_migrado',
        'detalle_ajuste',
        'monto_activado',
        'total_activado',
        'fecha_activacion',
        'fecha_reajuste',
        'saldo_fondesif',
        'fecha_ultimo_pago',
        'cuentas_fondesif',
        'depositos_cuenta_matriz',
        'capital_unicobro',
        'cuotas_canceladas',
        'fecha_ult_pago_unicobro',
        'venci_ult_cuota_pagada',
        'saldo_a_fecha',
        'monto_canceladoafecha',
        'departamento',
        'cuotas_adeudas',
        'dias',
        'estado_cartera',
        'observacion',
        'apuntes',
        'estado_social',
        'user_id',
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function credit()
    {
        return $this->hasOne(Credit::class, 'unid_hab_id', 'unid_hab_id');
    }

    public function legal()
    {
        return $this->hasOne(Legal::class, 'unid_hab_id', 'unid_hab_id');
    }*/
}
