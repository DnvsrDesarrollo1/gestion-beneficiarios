<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'creditos';
    protected $primaryKey = 'creditos_id';

    protected $fillable = [
        'uh_asignada_id',
        'cod_prestamo',
        'estado_cartera',
        'entidad_financiera',
        'cod_promotor',
        'cod_cristorey',
        'cod_fondesif',
        'cod_smp',
        'monto_credito',
        'monto_activado',
        'total_activado',
        'gastos_judiciales',
        'saldo_credito',
        'monto_recuperado',
        'fecha_activacion',
        'plazo_credito',
        'tasa_interes',
        'observaciones',
        'fecha_reg'
    ];
}
