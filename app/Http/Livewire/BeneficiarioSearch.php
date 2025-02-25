<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;

class BeneficiarioSearch extends Component
{
    use WithPagination;

    //protected $paginationTheme = 'bootstrap';

    public $search = '';

    //protected $beneficiarioService;

    public function __construct()
    {
        $this->beneficiarioService = app(BeneficiarioService::class);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $listar = $this->beneficiarioService->obtenerBeneficiarios($this->search);
        return view('livewire.beneficiario-search', compact('listar'));
        //return view('livewire.beneficiario-search', ['listar' => $beneficiarios]);
       //dd($this->search);
    }

}
