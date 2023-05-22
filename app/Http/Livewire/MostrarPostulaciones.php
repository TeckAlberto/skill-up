<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use Livewire\Component;

class MostrarPostulaciones extends Component
{
    public function render()
    {

        $postulaciones = Candidato::where('user_id', auth()->user()->id)->get();


        return view('livewire.mostrar-postulaciones', [
            'postulaciones' => $postulaciones
        ]);
    }
}
