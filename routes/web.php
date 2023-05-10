<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\ValidacionEmpresaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->middleware('auth', 'custom.verify')->name('home');



Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'custom.verify', 'rol.reclutador'])->name('vacantes.index');

Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth', 'custom.verify'])->name('vacantes.create');

Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'custom.verify'])->name('vacantes.edit');

Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('candidatos/{vacante}', [CandidatosController::class, 'index'])->name('candidatos.index');


// Route::get('/{user}', [CandidatosController::class, 'index'])->name('candidatos.index');



// Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'custom.verify', 'rol.reclutador'])->name('notificaciones');


Route::get('empresa-validacion', [ValidacionEmpresaController::class, 'create'])->middleware(['auth', 'rol.reclutador'])->name('empresa-validacion.create');

Route::get('/validaciones', [ValidacionEmpresaController::class, 'index'])->middleware(['auth', 'custom.verify', 'rol.admin'])->name('validaciones.index');

Route::get('/validacion/{solicitud}', [ValidacionEmpresaController::class, 'show'])->middleware(['auth', 'custom.verify', 'rol.admin'])->name('validaciones.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/403', function () {
    return view('errors.403');
})->name('forbidden');



require __DIR__.'/auth.php';
