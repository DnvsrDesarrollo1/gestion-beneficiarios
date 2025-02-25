<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'devolucion_pago';
    protected $primaryKey = 'devolucion_id';
    protected $filiable = [
        'uh_asignada_id',
        'cod_prestamo',
        'instructivo_devolucion',
        'monto_devolucion',
        'beneficiario_id',
        'proyecto_id',
        'nro_cuenta',
        'fecha_autorizacion',
        'observaciones'
    ];
}
