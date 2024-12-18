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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $beneficiarios = Social::where('nombre_beneficiario_final', 'like', '%' . $this->search . '%')
            ->orWhere('nombre_titular', 'like', '%' . $this->search . '%')
            ->orWhere('ci_titular', 'like', '%' . $this->search . '%')
            ->orWhere('ci_beneficiario_final', 'like', '%' . $this->search . '%')
            ->orWhere('nombre_proyecto', 'like', '%' . $this->search . '%')
            ->orWhere('proceso_estado_benef_final', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.beneficiario-search', compact('beneficiarios'));
    }
}
