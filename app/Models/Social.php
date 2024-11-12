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
        'nombre_titular',
        'ci_titular',
        'nombre_conyugue',
        'ci_conyugue',
        'aplic_ley850_estado_social_fuente',
        'fuente_excepcionalidad',
        'nombre_benef_excepcionalidad',
        'ci_benef_excepcionalidad',
        'estado_social_excepcionalidad',
        'fuente_reasignacion',
        'nombre_benef_reasignacion',
        'ci_benef_reasignacion',
        'estado_social_reasignacion',
        'fuente_sustitucion',
        'nombre_sustitucion',
        'ci_benf_sustitucion',
        'estado_social_sustitucion',
        'nombre_beneficiario_final',
        'ci_beneficiario_final',
        'nom_cony_benef_final',
        'ci_conyu_benef_final',
        'estado_social_benef_final',
        'proceso_estado_benef_final',
        'observacion_benef_final',
        'user_id',
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
