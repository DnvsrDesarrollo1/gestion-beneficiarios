<?php

namespace App\Http\Livewire;

use App\Models\Credit;
use Livewire\Component;
use App\Models\Social;
use Livewire\WithPagination;

class Beneficiario_ciSearch extends Component
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
        $beneficiarios = Credit::where('ci', 'like', '%' . $this->search . '%')
            //->orWhere('', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.beneficiario_ci-search', compact('beneficiarios'));
    }
}
