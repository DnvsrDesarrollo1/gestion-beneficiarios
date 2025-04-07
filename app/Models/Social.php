<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'estado_social';
    protected $primaryKey = 'estado_social_id';
    protected $fillable = [
        'uh_asignada_id',
        'estado_social',
        'fecha_verificacion',
        'proceso_estado',
        'fuente',
        'observaciones',
        'estado_reg',
        'usuario_reg',
        'fecha_reg',
        'updated_at'

    ];

    public function usignad()
    {
        return $this->belongsTo(Usignad::class, 'uh_asignada_id', 'uh_asignada_id');
    }
}
