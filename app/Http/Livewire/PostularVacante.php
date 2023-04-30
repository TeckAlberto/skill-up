<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => ['required', 'mimes:pdf']
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){
        $datos = $this->validate();

        // Almacenar cv en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);


        // Crear el candidato
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);




        // $datos = $this->validate();
        // // validar que el usuario no haya postulado a la vacante
        // if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
        //     session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
        // } else {
        //     // Postularse y almacenar el CV
        //     $cv = $this->cv->store('public/cv');
        //     $datos['cv'] = str_replace('public/cv/', '', $cv);

        //     // Crear el candidato a la vacante
        //     $this->vacante->candidatos()->create([
        //         'user_id' => auth()->user()->id,
        //         'cv' => $datos['cv']
        //     ]);

        //     // Crear notificación y enviar el email
        //     $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id ));

        //     // Mostrar el usuario un mensaje de ok
        //     session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

        //     return redirect()->back();
        // }







        // Crear notificacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));


        //Mostrar el usuario un mensaje de ok
        session()->flash('mensaje', 'Se envio correctamente tu informacion, mucha suerte');

        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
