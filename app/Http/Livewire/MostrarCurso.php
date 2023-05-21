<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use Livewire\Component;

class MostrarCurso extends Component
{

    public $curso;

    protected $listeners = [
        'ocultarPublicacion'
    ];


    function ocultarPublicacion(Curso $curso)
    {
        $curso->publicado = 0;
        $curso->save();

    }

    public function render()
    {
        return view('livewire.mostrar-curso');
    }
}
