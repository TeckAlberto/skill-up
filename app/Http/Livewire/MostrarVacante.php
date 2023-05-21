<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{

    public $vacante;

    protected $listeners = [
        'ocultarPublicacion'
    ];


    function ocultarPublicacion(Vacante $vacante)
    {
        $vacante->publicado = 0;
        $vacante->save();

    }


    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
