<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(User $perfil)
    {


        return view('perfiles.show', [
            'perfil' => $perfil
        ]);
    }
}
