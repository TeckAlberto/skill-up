<?php

namespace App\Http\Livewire;

use App\Models\Cursante;
use Livewire\Component;

class MostrarInscripciones extends Component
{
    public function render()
    {
        $inscripciones = Cursante::where('user_id', auth()->user()->id)->get();


        return view('livewire.mostrar-inscripciones', [
            'inscripciones' => $inscripciones
        ]);
    }
}
