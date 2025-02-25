<?php

namespace App\Http\Livewire;

use App\Services\BeneficiarioService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BeneficiarioSearch extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        // Aquí deberías agregar la lógica para buscar los beneficiarios
        // Por ejemplo, podrías buscar en la base de datos
        $this->resetPage();
    }

    public function render()
    {
        $query = DB::table('beneficiarios as b1')
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->leftJoin('uh_asignada as uha', 'b1.beneficiario_id', '=', 'uha.beneficiario_id') // Cambiado a leftJoin si puede no haber asignación
            ->leftJoin('unidad_habitacional as uh', 'uha.unidad_habitacional_id', '=', 'uh.unidad_habitacional_id') // También leftJoin si aplica

            ->select([
                'b1.nombres as nombres_beneficiario',
                'b1.cedula_identidad as cedula_benef',
                'b2.nombres as nombres_conyugue',
                'b2.cedula_identidad as cedula_conyugue',
                DB::raw('nombre_depto(uh.departamento_id) as "departamento"'), // Alias con comillas dobles
                DB::raw('nombre_proyecto(uh.proyecto_id) as "proyecto"'),
                'uh.manzano',
                'uh.lote',
                'uha.uh_asignada_id',
                'uh.unidad_habitacional_id'
            ])
            ->where('uha.estado_reg', 'U')
            ->where('b1.estado_reg', 'U')
            //->where('b1.nombres', 'like', '%' . $this->search . '%')
            ->where('b1.cedula_identidad', 'like', '%' . $this->search . '%')
            //->where('b2.nombres', 'like', '%' . $this->search . '%')
            ->get();

            // Aplicar paginación en lugar de get()
        $beneficiarios = $query->paginate(10);


        return view('livewire.beneficiario-search', compact('query'));
    }
}
