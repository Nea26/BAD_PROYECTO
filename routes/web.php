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

Route::get('/catalogo', [App\Http\Controllers\HomeController::class, 'catalogoLibros'])->name('catalogo');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register-user', [UsuariosRegistroController::class, 'register'])->name('register-user')->middleware('can:register-user');
Route::prefix('profesor')->group(function () {
    Route::resource('/home', ProfesorController::class)->except([
        'index'
    ]);
});

Route::prefix('bibliotecario')->group(function () {
    Route::resource('/home', BibliotecarioController::class)->except([
        'index'
    ]);
    Route::post('/home/{id}', [BibliotecarioController::class, 'cambiarEstado'])->name('bibliotecario/home/');
});

Route::prefix('miembro')->group(function () {
    Route::resource('/home', MiembroController::class)->except([
        'index'
    ]);
});
