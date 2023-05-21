<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Modalidad;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $terminoV;
    public $salario;
    public $categoria;
    public $modalidadV;

    public $terminoC;
    public $modalidadC;


    public function  leerDatosFormulario(){

        $this->emit('terminosBusqueda', $this->terminoV, $this->categoria, $this->salario, $this->modalidadV, $this->terminoC, $this->modalidadC);

    }

    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();
        $modalidades = Modalidad::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias,
            'modalidades' => $modalidades,
        ]);
    }
}
