<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');


Route::get('/alumnos/export/general', [AlumnoController::class, 'export'])->name('alumnos.export.general');
Route::get('/alumnos/export/profesor', [AlumnoController::class, 'exportPorProfesor'])->name('alumnos.export.profesor');
Route::get('/alumnos/export/rango-nota', [AlumnoController::class, 'exportPorRangoNota'])->name('alumnos.export.rango_nota');
Route::get('/alumnos/export/ficha/{alumnoId}', [AlumnoController::class, 'exportFichaAlumno'])->name('alumnos.export.ficha');