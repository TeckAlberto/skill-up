<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Curso::class);
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $this->authorize('create', Curso::class);
    //     return view('vacantes.create');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', [
            'curso' => $curso
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //dd($vacante);
        $this->authorize('update', $curso);

        return view('cursos.edit', [
            'curso' => $curso
        ]);
    }

    public function indexuser()
    {
        return view('cursos.indexuser');

    }
}
