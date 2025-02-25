<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BeneficiarioService
{
    public function obtenerBeneficiarios($search=null)
    {
        $query = DB::table('beneficiarios as b1')
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->join('uh_asignada as uha', 'b1.beneficiario_id', '=', 'uha.beneficiario_id')
            ->join('unidad_habitacional as uh', 'uha.unidad_habitacional_id', '=', 'uh.unidad_habitacional_id')
            ->select([
                'b1.nombres as nombres_beneficiario',
                'b1.cedula_identidad as cedula_benef',
                'b2.nombres as nombres_conyugue',
                'b2.cedula_identidad as cedula_conyugue',
                DB::raw('nombre_depto(uh.departamento_id) as departamento'),
                DB::raw('nombre_proyecto(uh.proyecto_id) as proyecto'),
                'uh.manzano',
                'uh.lote',
                'uha.uh_asignada_id',
                'uh.unidad_habitacional_id'
            ])
            ->where('uha.estado_reg', 'U')
            ->where('b1.estado_reg', 'U');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('b1.nombres', 'like', '%' . $search . '%')
                  ->orWhere('b1.cedula_identidad', 'like', '%' . $search . '%')
                  ->orWhere('b2.nombres', 'like', '%' . $search . '%');
            });
        }
        //Depuración: Verifica si la consulta devuelve resultados
        //dd($query->toSql(), $query->getBindings());

      return $query->get();
    }
}
