<?php

namespace App\Http\Livewire;

use App\Models\Cursante;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    public $vacante;


    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){

        // Crear el candidato
        // $this->vacante->candidatos()->create([
        //     'user_id' => auth()->user()->id,
        // ]);


        // validar que el usuario no haya postulado a la vacante
        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('postulado', 'Ya postulaste a esta vacante anteriormente');
        } else {

            // Crear el candidato a la vacante
            $this->vacante->candidatos()->create([
                'user_id' => auth()->user()->id,
            ]);

            // Crear notificación y enviar el email
            $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id ));

            // Mostrar el usuario un mensaje de ok
            session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

            return redirect()->back();
        }


    }

    public function render()
    {


        //dd($inscrito);

        return view('livewire.postular-vacante');
    }
}
