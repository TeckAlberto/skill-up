<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MostrarVacantes extends Component
{

    protected $listeners = [
        'eliminarVacante',
        'activarPublicacion',
    ];

    public function eliminarVacante( Vacante $vacante){

         $vacante->delete();
    }

    public function activarPublicacion( Vacante $vacante){

        $vacante->publicado = 1;
        $vacante->save();
   }


    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)
            ->paginate(6);


        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
