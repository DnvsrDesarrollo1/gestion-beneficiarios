<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Social;
use Livewire\WithPagination;

class BeneficiarioSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $proyecto = '';
    public $searchType = 'partial';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateAlerta($id_soc, $valor)
    {
        Social::where('id_soc', $id_soc)->update(['alerta' => $valor]);
        session()->flash('message', 'Estado actualizado correctamente');
    }

    public function render()
    {
        $proyectos = Social::select('nombre_proyecto')->orderBy('nombre_proyecto')->distinct()->get();

        $query = Social::query();

        if ($this->search) {
            $query->where(function ($q) {
                if ($this->searchType === 'exact') {
                    $searchTerm = $this->search . ' ';
                    $q->where('nombre_beneficiario_final', 'like', $searchTerm . '%')
                        ->orWhere('nombre_titular', 'like', $searchTerm . '%')
                        ->orWhere('ci_titular', 'like', $searchTerm . '%')
                        ->orWhere('ci_beneficiario_final', 'like', $searchTerm . '%')
                        ->orWhere('nombre_proyecto', 'like', $searchTerm . '%')
                        ->orWhere('proceso_estado_benef_final', 'like', $searchTerm . '%');
                } else {
                    $q->where('nombre_beneficiario_final', 'like', '%' . $this->search . '%')
                        ->orWhere('nombre_titular', 'like', '%' . $this->search . '%')
                        ->orWhere('ci_titular', 'like', '%' . $this->search . '%')
                        ->orWhere('ci_beneficiario_final', 'like', '%' . $this->search . '%')
                        ->orWhere('nombre_proyecto', 'like', '%' . $this->search . '%')
                        ->orWhere('proceso_estado_benef_final', 'like', '%' . $this->search . '%');
                }
            });
        }

        if ($this->proyecto) {
            $query->where('nombre_proyecto', $this->proyecto);
        }

        $beneficiarios = $query->orderBy('manzano', 'DESC')
            ->orderBy('lote', 'DESC')
            ->paginate(25);

        return view('livewire.beneficiario-search', [
            'beneficiarios' => $beneficiarios,
            'proyectos' => $proyectos,
            'alertaOpciones' => [
                'SE VISITÓ' => 'SE VISITÓ',
                'NO SE VISITÓ' => 'NO SE VISITÓ',
                'VOLVER' => 'VOLVER'
            ]
        ]);
    }
}
