<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PrestamoPendienteController;

=======
use App\Http\Controllers\UsuariosRegistroController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\LibroController;
>>>>>>> master
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home.html', function () {
    return view('home2');
});
<<<<<<< HEAD
=======

Auth::routes();

Route::get('/catalogo', [App\Http\Controllers\HomeController::class, 'catalogoLibros'])->name('catalogo');
Route::resource('book', LibroController::class );

Route::get('/bibliotecario/home/buscar', [BibliotecarioController::class, 'buscar'])->name('bibliotecario/home/buscar');
Route::get('/profesor/home/buscar', [ProfesorController::class, 'buscar'])->name('profesor/home/buscar');
Route::get('/miembro/home/buscar', [MiembroController::class, 'buscar'])->name('miembro/home/buscar');

Route::get('/catalogo', [App\Http\Controllers\HomeController::class, 'catalogoLibros'])->name('catalogo');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/profesores', [App\Http\Controllers\ProfesorController::class, 'verProfesores'])->name('home/profesores');
Route::get('/home/miembros', [App\Http\Controllers\MiembroController::class, 'verMiembros'])->name('home/miembros');
Route::get('/bibliotecario/pagination', [App\Http\Controllers\BibliotecarioController::class, 'pagination'])->name('/bibliotecario/pagination');
Route::get('/profesor/pagination', [App\Http\Controllers\ProfesorController::class, 'pagination'])->name('/profesor/pagination');
Route::get('/miembro/pagination', [App\Http\Controllers\MiembroController::class, 'pagination'])->name('/miembro/pagination');

Route::post('/register-user', [UsuariosRegistroController::class, 'register'])->name('register-user')->middleware('can:register-user');

Route::prefix('profesor')->group(function () {
    Route::resource('/home', ProfesorController::class)->except([
        'index'
    ]);
    Route::post('/home/{id}', [ProfesorController::class, 'update'])->name('profesor/home/');
    Route::get('/home/edit/{id}', [ProfesorController::class, 'edit'])->name('profesor/home/edit/');
});

Route::prefix('bibliotecario')->group(function () {
    Route::resource('/home', BibliotecarioController::class)->except([
        'index'
    ]);
    Route::post('/home/estado/{id}', [BibliotecarioController::class, 'cambiarEstado'])->name('bibliotecario/home/estado/');
    Route::post('/home/{id}', [BibliotecarioController::class, 'update'])->name('bibliotecario/home/');
    Route::get('/home/edit/{id}', [BibliotecarioController::class, 'edit'])->name('bibliotecario/home/edit/');
   // Route::get('/home/buscar', [BibliotecarioController::class, 'buscar'])->name('bibliotecario/home/buscar');
});

Route::prefix('miembro')->group(function () {
    Route::resource('/home', MiembroController::class)->except([
        'index'
    ]);
    Route::post('/home/{id}', [MiembroController::class, 'update'])->name('miembro/home/');
    Route::get('/home/edit/{id}', [MiembroController::class, 'edit'])->name('miembro/home/edit/');
    
});

>>>>>>> master
//Prestamo Miembros
Route::get('/prestamo.html', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::get('/CrearPrestamo.html', [PrestamoController::class, 'create']);
Route::post('/CrearPrestamo.html', [PrestamoController::class, 'store'])->name('prestamo.store');
Route::get('/prestamo/{prestamo}', [PrestamoController::class, 'show']);
Route::get('/prestamo/{prestamo}/editar', [PrestamoController::class, 'edit'])->name('prestamo.edit');
Route::patch('/prestamo/{prestamo}', [PrestamoController::class, 'update'])->name('prestamo.update');
Route::delete('/prestamo/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamo.destroy');


//prestamos pendientes
Route::get('/prestamospendientes.html', [PrestamoPendienteController::class, 'index'])->name('prestamoPendiente.index');
Route::get('/prestamo/{prestamo}', [PrestamoPendienteController::class, 'show'])->name('prestamoPendiente.show');
Route::get('/prestamoPendiente/{prestamo}/editar', [PrestamoPendienteController::class, 'edit'])->name('prestamoPendiente.edit');
Route::patch('/prestamoPendiente/{prestamo}', [PrestamoPendienteController::class, 'update'])->name('prestamoPendiente.update');
Route::delete('/prestamoPendiente/{prestamo}', [PrestamoPendienteController::class, 'destroy'])->name('prestamoPendiente.destroy');
Route::get('/prestamoPendiente/{prestamo}/devolver', [PrestamoPendienteController::class, 'devolver'])->name('prestamoPendiente.devolver');
Route::patch('/prestamoPendiente/{prestamo}/devolver', [PrestamoPendienteController::class, 'devolucion'])->name('prestamoPendiente.devolucion');

Route::get('/reservaciones.html', function () {
    return view('reservaciones');
});

Route::get('/reportes.html', function () {
    return view('reportes');
});


Route::get('/prueba', function () {
    return DB::select('select * from PRESTAMOMIEMBRO');
});
<<<<<<< HEAD




=======
>>>>>>> master
