<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'infor_legal';
    protected $primaryKey = 'inforlegal_id';
    protected $filiable =[
        'uh_asignada_id',
        'nro_folio_real',
        'titulacion',
        'levanta_grav_dev_doc',
        'notificacion_intencion',
        'notificacion_contractual',
        'elab_min_cont_test',
        'folio_aevivienda',
        'inicio_reasig_sustit',
        'usuario_reg'
    ];
}
