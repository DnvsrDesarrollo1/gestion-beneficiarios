<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'infor_legal';
    protected $primaryKey = 'inforlegal_id';
    protected $filiable =[
        'uh_asignada_id',
        'manzano',
        'lote',
        'nro_folio_real',
        'titulacion',
        'observaciones1',
        'levanta_grav_dev_doc',
        'observado_ley850',
        'notificacion_intencion',
        'notificacion_contractual',
        'elab_min_cont_test',
        'folio_aevivienda',
        'observaciones2',
        'inicio_reasig_sustit',
        'nuevo_beneficiario',
        'ci_nuevo_benef',
        'minuta_testimonio',
        'observaciones3',
        'estado_reg',
        'usuario_reg',
        'fecha_reg'
    ];
}
