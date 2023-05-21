<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Modalidad;
use App\Models\Tipo;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria;
    public $ultimo_dia;
    public $descripcion;
    public $modalidad;
    public $cupos;
    public $tipo;
    public $costo;
    public $activado = false;

    public function activarPublicacion()
    {
        if($this->tipo == '2'){
            $this->activado = true;
        }else{
            $this->activado = false;
        }
    }


    protected $vacante = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'modalidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required|numeric',
    ];

    protected $curso = [
        'titulo' => 'required|string',
        'modalidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'cupos' => 'required|numeric',
        'costo' => 'required|numeric',
        'tipo' => 'required|numeric',
    ];

    public function crearVacante(){

        if($this->tipo == 1){
            $datos = $this->validate($this->vacante);
            //dd($datos);
            Vacante::create([
                'titulo' => $datos['titulo'],
                'tipo' => $datos['tipo'],
                'salario_id' => $datos['salario'],
                'categoria_id' => $datos['categoria'],
                'modalidad_id' => $datos['modalidad'],
                'ultimo_dia' => $datos['ultimo_dia'],
                'descripcion' => $datos['descripcion'],
                'user_id' => auth()->user()->id,
            ]);

            session()->flash('mensaje','La vacante se publico correctamente');


            return redirect()->route('vacantes.index');

        }else{
            $datos = $this->validate($this->curso);
            Curso::create([
                'titulo' => $datos['titulo'],
                'tipo' => $datos['tipo'],
                'modalidad_id' => $datos['modalidad'],
                'ultimo_dia' => $datos['ultimo_dia'],
                'descripcion' => $datos['descripcion'],
                'user_id' => auth()->user()->id,
                'cupos' => $datos['cupos'],
                'costo' => $datos['costo'],
            ]);

            session()->flash('mensaje','El curso se publico correctamente');

            return redirect()->route('cursos.index');

        }


    }

    public function render()
    {
        // Consultar DB
        $salarios = Salario::all();
        $categorias = Categoria::all();
        $modalidades = Modalidad::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
            'modalidades' => $modalidades,
        ]);
    }
}
