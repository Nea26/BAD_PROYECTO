<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PrestamoPendienteController;

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

Route::get('/home.html', function () {
    return view('home2');
});
//Prestamo Miembros
Route::get('/prestamo.html', [PrestamoController::class, 'index'])->name('prestamo.index');
Route::get('/CrearPrestamo.html', [PrestamoController::class, 'create']);
Route::post('/CrearPrestamo.html', [PrestamoController::class, 'store'])->name('prestamo.store');
Route::get('/prestamo/{prestamo}', [PrestamoController::class, 'show']);
Route::get('/prestamo/{prestamo}/editar', [PrestamoController::class, 'edit'])->name('prestamo.edit');
Route::patch('/prestamo/{prestamo}', [PrestamoController::class, 'update'])->name('prestamo.update');


//prestamos pendientes
Route::get('/prestamospendientes.html', [PrestamoPendienteController::class, 'index'])->name('prestamoPendiente.index');
Route::get('/prestamo/{prestamo}', [PrestamoPendienteController::class, 'show'])->name('prestamoPendiente.show');
Route::get('/prestamoPendiente/{prestamo}/editar', [PrestamoPendienteController::class, 'edit'])->name('prestamoPendiente.edit');
Route::patch('/prestamoPendiente/{prestamo}', [PrestamoPendienteController::class, 'update'])->name('prestamoPendiente.update');

Route::get('/reservaciones.html', function () {
    return view('reservaciones');
});

Route::get('/reportes.html', function () {
    return view('reportes');
});


Route::get('/prueba', function () {
    return DB::select('select * from PRESTAMOMIEMBRO');
});




