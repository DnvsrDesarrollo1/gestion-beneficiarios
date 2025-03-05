<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BeneficiarioSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    //public $search = '';
    public $nombre = '';
    public $cedula = '';
    public $nom_conyugue = '';
    public $cedula_cony = '';
    public $benefi_cod = '';
    public $fecha_na = '';
    public $manzano = '';
    public $lote = '';
    public $unidad_habitacional = '';

    public function buscar()
    {
        // Aquí deberías agregar la lógica para buscar los beneficiarios
        // Por ejemplo, podrías buscar en la base de datos
        $this->render();
    }

    public function render()
    {
        $query = DB::table('beneficiarios as b1')
            ->leftJoin('conyugues as c', 'b1.beneficiario_id', '=', 'c.beneficiario_id')
            ->leftJoin('beneficiarios as b2', 'c.beneficiario_conyu_id', '=', 'b2.beneficiario_id')
            ->leftJoin('uh_asignada as uha', 'b1.beneficiario_id', '=', 'uha.beneficiario_id')
            ->leftJoin('unidad_habitacional as uh', 'uha.unidad_habitacional_id', '=', 'uh.unidad_habitacional_id')
            ->select([
                'b1.beneficiario_cod',
                'b1.fecha_nacimiento',
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
            //->where('b1.nombres', 'like', '%'. $this->search .'%') // Condición de búsqueda específica
            //->paginate(10);
            // Aplicar filtros solo si los campos tienen valores
        if (!empty($this->nombre)) {
            $query->where('b1.nombres', 'like', '%' . $this->nombre . '%');
        }
        if (!empty($this->cedula)) {
            $query->where('b1.cedula_identidad', 'like', '%' . $this->cedula . '%');
        }

        if (!empty($this->nom_conyugue)) {
            $query->where('b2.nombres', 'like', '%' . $this->nom_conyugue . '%');
        }

        if (!empty($this->cedula_cony)) {
            $query->where('b2.cedula_identidad', 'like', '%' . $this->cedula_cony . '%');
        }

        if (!empty($this->benefi_cod)) {
            $query->where('b1.beneficiario_cod', 'like', '%' . $this->benefi_cod . '%');
        }

        if (!empty($this->fecha_na)) {
            $query->whereDate('b1.fecha_nacimiento', $this->fecha_na);
        }

        if (!empty($this->manzano)){
            $query->where('uh.manzano','like', '%'.$this->manzano.'%');
        }

        if(!empty($this->lote)){
            $query->where('uh.lote','like', '%'. $this->lote . '%');
        }

        if(!empty($this->unidad_habitacional)){
            $query->where('uh.unidad_habitacional_id', 'like', '%'. $this->unidad_habitacional.'%');
        }


        $beneficiarios = $query->paginate(10);

        return view('livewire.beneficiario-search', compact('beneficiarios'));


    }
}
