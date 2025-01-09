<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'extracreditos';

    protected $primaryKey = 'id_cred';

    protected $fillable = [
        'codigo_credito',
        'fono',
        'departamento',
        'estado_cartera',
        'nombre_beneficiario',
        'ci',
        'total_activado',
        'monto_canceladoafecha',
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

    public function legal()
    {
        return $this->belongsTo(Legal::class, 'unid_hab_id', 'unid_hab_id');
    }

}
