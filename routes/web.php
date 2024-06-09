<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosRegistroController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\MiembroController;
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

Auth::routes();

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
