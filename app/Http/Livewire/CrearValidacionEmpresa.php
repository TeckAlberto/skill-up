<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ValidacionEmpresa;

class CrearValidacionEmpresa extends Component
{
    use WithFileUploads;

    public $rfc;
    public $telefono;
    public $correo;
    public $comprobante;

    protected $rules = [
        'rfc' => 'required|string|size:12',
        'telefono' => 'required|size:10',
        'correo' => 'required|email',
        'comprobante' => 'required|mimes:pdf',
    ];

    public function crearValidacionEmpresa(){
        $datos = $this->validate();
        //debug($datos);

        // Almacenar la imagen
        $comprobante = $this->comprobante->store('public/comprobantes');
        $datos['comprobante'] = str_replace('public/comprobantes/', '', $comprobante);

        // debug($nombre_imagen);

        // Crear la validacion de la empresa
        ValidacionEmpresa::create([
            'rfc' => $datos['rfc'],
            'telefono' => $datos['telefono'],
            'correo' => $datos['correo'],
            'comprobante' => $datos['comprobante'],
            'user_id' => auth()->user()->id,
        ]);


        // Crear un mensaje
        session()->flash('mensaje','Se ha solicitado la verificacion correctamente');


        // Redireccionar al usuario
        return redirect()->route('empresa-validacion.create');



    }

    // public function render()
    // {

    //     // Consultar DB
    //     $salarios = Salario::all();
    //     $categorias = Categoria::all();

    //     return view('livewire.crear-vacante', [
    //         'salarios' => $salarios,
    //         'categorias' => $categorias,
    //         //'datos' => $datos,
    //     ]);
    // }

    public function render()
    {
        return view('livewire.crear-validacion-empresa', [

        ]);
    }
}
