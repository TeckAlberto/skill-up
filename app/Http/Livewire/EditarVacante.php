<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Modalidad;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;

    public $titulo;
    public $salario;
    public $categoria;
    public $ultimo_dia;
    public $descripcion;
    public $modalidad;
    public $cupos;




    use WithFileUploads;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'modalidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
    ];

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->modalidad = $vacante->modalidad_id;
        $this->ultimo_dia = Carbon::parse( $vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
    }

    public function editarVacante(){
        $datos = $this->validate();

        //Revisar si hay nueva imagen



        //Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //Asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->modalidad_id = $datos['modalidad'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];

        //Guaradar la vacante
        $vacante->save();

        //Redireccionar
        session()->flash('mensaje', 'La vacante se actualizo correctamente');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {

        // Consultar DB
        $salarios = Salario::all();
        $categorias = Categoria::all();
        $modalidades = Modalidad::all();


        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
            'modalidades' => $modalidades
        ]);
    }
}
