<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'extralegal';

    protected $primaryKey = 'id_leg';

    protected $fillable = [
        'departamento',
        'proyecto',
        'nro',
        'nombre_apellidos',
        'cedula_identidad',
        'manzano',
        'lote',
        'nro_folio_real',
        'titulacion',
        'observaciones1',
        'levantam_grav_dev_documentos',
        'observado_ley850',
        'notificación_intención',
        'notificación_res_contractual',
        'elab_minut_res_contrc_testim',
        'folio_nombre_aevivienda',
        'observaciones2',
        'inicio_reasignación_sustitución',
        'nuevo_beneficiario',
        'ci_nuevo_benef',
        'minuta_testimonio_folio',
        'observaciones3',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function social()
    {
        return $this->belongsTo(Social::class, 'unid_hab_id', 'unid_hab_id');
    }

    public function credit()
    {
        return $this->hasOne(Credit::class, 'unid_hab_id', 'unid_hab_id');
    }
}
