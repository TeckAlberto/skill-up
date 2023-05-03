<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\ValidacionEmpresa;
use Livewire\Component;

class MostrarValidacion extends Component
{

    public $solicitud;

    protected $listeners = [
        'aprobarValidacion'
    ];

    public function aprobarValidacion( ValidacionEmpresa $validacionEmpresa){

        $usuario = User::find($validacionEmpresa->user->id);

        $usuario->markEmailAsVerified();

        $validacionEmpresa->delete();

        session()->flash('mensaje', 'Se ha validado la empresa!');

        return redirect()->route('validaciones.index');
    }

    public function render()
    {
        return view('livewire.mostrar-validacion');
    }
}
