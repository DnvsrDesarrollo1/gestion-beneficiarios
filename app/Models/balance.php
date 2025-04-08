<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class balance extends Model
{
    protected $table = 'saldo_terreno';
    protected $primaryKey = 'saldotr_id';
    protected $fillable = [
        'proyecto_id',
        'monto_saldo',
        'cantidad_lotes',
        'instructivo_desemb',
        'nro_cuenta',
        'fecha_autorizacion',
        'observaciones'
    ];
}
