<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'extrasocial';

    protected $primaryKey = 'id_soc';

    protected $fillable = [
        'departamento',
        'nombre_proyecto',
        'manzano',
        'lote',
        'unidad_vecinal',
        'nombre_titular',
        'ci_titular',
        'ext_ci_titular',
        'nombre_conyugue',
        'ci_conyugue',
        'ext_ci_cony',
        'aplic_ley850_estado_social_fuente',
        'fuente_excepcionalidad',
        'nombre_benef_excepcionalidad',
        'ci_benef_excepcionalidad',
        'ext_ci_excep',
        'estado_social_excepcionalidad',
        'fuente_reasignacion',
        'nombre_benef_reasignacion',
        'ci_benef_reasignacion',
        'ext_ci_reasig',
        'estado_social_reasignacion',
        'fuente_sustitucion',
        'nombre_sustitucion',
        'ci_benf_sustitucion',
        'ext_ci_sust',
        'estado_social_sustitucion',
        'fuente_cambio_titular',
        'nombre_cambio_titular',
        'ci_cambio_titular',
        'ext_cambio_titular',
        'estado_social_cambiotitular',
        'observaciones_detalles',
        'nombre_beneficiario_final',
        'ci_beneficiario_final',
        'ext_ci_final',
        'nom_cony_benef_final',
        'ci_conyu_benef_final',
        'ext_ci_final_cony',
        'estado_social_benef_final',
        'proceso_estado_benef_final',
        'observacion_benef_final',
        'user_id',
        'alerta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function credit()
    {
        return $this->hasOne(Credit::class, 'unid_hab_id', 'unid_hab_id');
    }

    public function legal()
    {
        return $this->hasOne(Legal::class, 'unid_hab_id', 'unid_hab_id');
    }
}
