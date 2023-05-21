<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use App\Models\Curso;
use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Modalidad;

class EditarCurso extends Component
{
    public $curso_id;

    public $titulo;
    public $ultimo_dia;
    public $descripcion;
    public $modalidad;
    public $cupos;
    public $costo;

    protected $rules = [
        'titulo' => 'required|string',
        'modalidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'cupos' => 'required|numeric',
        'costo' => 'required|numeric',
    ];

    public function mount(Curso $curso){
        $this->curso_id = $curso->id;
        $this->titulo = $curso->titulo;
        $this->modalidad = $curso->modalidad_id;
        $this->ultimo_dia = Carbon::parse( $curso->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $curso->descripcion;
        $this->costo = $curso->costo;
        $this->cupos = $curso->cupos;
    }

    public function editarVacante(){
        $datos = $this->validate();

        //Revisar si hay nueva imagen



        //Encontrar la vacante a editar
        $curso = Curso::find($this->curso_id);

        //Asignar los valores
        $curso->titulo = $datos['titulo'];
        $curso->modalidad_id = $datos['modalidad'];
        $curso->ultimo_dia = $datos['ultimo_dia'];
        $curso->descripcion = $datos['descripcion'];
        $curso->cupos = $datos['cupos'];
        $curso->costo = $datos['costo'];

        //Guaradar la curso
        $curso->save();

        //Redireccionar
        session()->flash('mensaje', 'El curso se actualizo correctamente');

        return redirect()->route('cursos.index');
    }

    public function render()
    {
        // Consultar DB
        $modalidades = Modalidad::all();


        return view('livewire.editar-curso', [
            'modalidades' => $modalidades,
        ]);
    }
}
