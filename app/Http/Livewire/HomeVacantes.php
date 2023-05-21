<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $terminoV;
    public $salario;
    public $categoria;
    public $modalidadV;

    public $terminoC;
    public $modalidadC;

    protected $listeners = [
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($terminoV, $categoria, $salario, $modalidadV, $terminoC,  $modalidadC){

        $this->terminoV = $terminoV;
        $this->categoria = $categoria;
        $this->salario = $salario;
        $this->modalidadV = $modalidadV;

        $this->terminoC = $terminoC;
        $this->modalidadC = $modalidadC;

    }


    public function render()
    {



        $vacantes = Vacante::where('publicado', 1)
        ->when($this->terminoV, function ($query) {
            $query->where('titulo', 'LIKE', '%' . $this->terminoV . '%');
        })
        ->when($this->categoria, function ($query) {
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function ($query) {
            $query->where('salario_id', $this->salario);
        })
        ->when($this->modalidadV, function ($query) {
            $query->where('modalidad_id', $this->modalidadV);
        })
        ->get();

        $cursos = Curso::where('publicado', 1)
        ->when($this->terminoC, function ($query) {
            $query->where('titulo', 'LIKE', '%' . $this->terminoC . '%');
        })
        ->when($this->modalidadC, function ($query) {
            $query->where('modalidad_id', $this->modalidadC);
        })
        ->get();






        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
            'cursos' => $cursos
        ]);
    }
}
