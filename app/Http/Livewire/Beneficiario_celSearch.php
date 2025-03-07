<?php

namespace App\Http\Livewire;

use App\Models\Credit;
use Livewire\Component;
use App\Models\Social;
use Livewire\WithPagination;

class Beneficiario_celSearch extends Component
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
        $beneficiarios = Credit::where('nombre_beneficiario', 'like', '%' . $this->search . '%')
            ->orWhere('ci', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.beneficiario_cel-search', compact('beneficiarios'));
    }
}
