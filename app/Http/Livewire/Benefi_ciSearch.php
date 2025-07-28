<?php

namespace App\Http\Livewire;

use App\Models\Social;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Benefi_ciSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (empty($this->search)) {
            $beneficiarios = collect();
        } else {
            $beneficiarios = DB::table('extrasocial as s')
                ->join('extracreditos as c', 's.unid_hab_id', '=', 'c.unid_hab_id')
                ->select([
                    's.id_soc',
                    's.unid_hab_id',
                    's.nombre_beneficiario_final',
                    's.ci_beneficiario_final',
                    's.departamento',
                    's.telefono_final',
                    'c.fono',     // ahora sí funciona
                    'c.fono1',
                    'c.fono2',
                ])
                ->where('s.ci_beneficiario_final', 'like', '%' . $this->search . '%')
                ->limit(1)
                ->get();
        }

        return view('livewire.benefi_ci-search', compact('beneficiarios'));
    }
}
