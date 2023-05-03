<?php

namespace App\Http\Controllers;

use App\Models\ValidacionEmpresa;
use Illuminate\Http\Request;

class ValidacionEmpresaController extends Controller
{
    //
    public function create(Request $request)
    {
        //dd($request->user()->name);
        return view('auth.validacion-empresa',[
            'empresa' => $request->user()
        ]);
    }

    public function index()
    {


        return view('validaciones.index');
    }

    public function show(ValidacionEmpresa $solicitud){


        return view('validaciones.show', [
            'solicitud' => $solicitud
        ]);
    }


}
