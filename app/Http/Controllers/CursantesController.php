<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursantesController extends Controller
{
    //
    public function index(Curso $curso){

        return view('candidatos.index', [
            'curso' => $curso
        ]);

    }
}
