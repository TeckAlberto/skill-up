<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use Livewire\Component;

class MostrarCursos extends Component
{
    protected $listeners = [
        'eliminarCurso',
        'activarPublicacion'
    ];

    public function eliminarVacante( Curso $curso){
        $curso->delete();
    }

    public function activarPublicacion( Curso $curso){
        $curso->publicado = 1;
        $curso->save();
    }


    public function render()
    {
        $cursos = Curso::where('user_id', auth()->user()->id)
               ->paginate(6);

        return view('livewire.mostrar-cursos', [
            'cursos' => $cursos,
        ]);
    }
}
