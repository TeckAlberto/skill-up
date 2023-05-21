<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use Livewire\Component;
use App\Models\Cursante;

class AgregarCurso extends Component
{

    public $curso;


    public function mount(Curso $curso){
        $this->curso = $curso;
    }

    public function inscribirme(){


        // validar que el usuario no haya postulado a la vacante
        if($this->curso->cursantes()->where('user_id', auth()->user()->id)->count() > 0) {
            $this->curso->cursantes()->delete();

            session()->flash('inscrito', 'Te has desinscrito al curso');
            return redirect()->back();

        } else {

            // Crear el candidato a la vacante
            $this->curso->cursantes()->create([
                'user_id' => auth()->user()->id,
            ]);


            // Mostrar el usuario un mensaje de ok
            session()->flash('mensaje', 'Se envió correctamente tu información');

            return redirect()->back();
        }
    }


    public function render()
    {

        $inscrito = Cursante::where('user_id', auth()->user()->id)
                    ->where('curso_id', $this->curso->id)
                    ->first();


        return view('livewire.agregar-curso', [
            'inscrito' => $inscrito
        ]);
    }
}
