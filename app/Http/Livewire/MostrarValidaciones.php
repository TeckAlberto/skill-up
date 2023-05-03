<?php

namespace App\Http\Livewire;

use App\Models\ValidacionEmpresa;
use Livewire\Component;

class MostrarValidaciones extends Component
{
    public function render()
    {
        $solicitudes = ValidacionEmpresa::all();

        return view('livewire.mostrar-validaciones', [
            'solicitudes' => $solicitudes
        ]);
    }
}
