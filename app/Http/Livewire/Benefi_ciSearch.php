<?php

namespace App\Http\Livewire;

use App\Models\Beneficiari;
use Livewire\Component;
use Livewire\WithPagination;

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

        if(empty($this->search)) {
            $beneficiarios = collect();
        } else {
            $beneficiarios = Beneficiari::select('cedula_identidad', 'nombres', 'departamento', 'telefono', 'beneficiario_id')
                ->distinct()// Asegura que no haya duplicados
                ->where('cedula_identidad', 'like', '%' . $this->search . '%')// Filtra por la búsqueda
                ->limit(1)
                ->get();
        }

        return view('livewire.benefi_ci-search', compact('beneficiarios'));


    }
}
