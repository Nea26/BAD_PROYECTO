<?php

namespace App\Http\Controllers;

use App\Models\Bibliotecario;
use Illuminate\Http\Request;
use App\Models\User;

class BibliotecarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:bibliotecario.home.destroy')->only('destroy');
        $this->middleware('can:bibliotecario.home.cambiarEstado')->only('cambiarEstado');
    }
    //Eliminar bibliotecario
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'Eliminacion exitosa');
    }
    //Cambiar estado
    public function cambiarEstado($id)
    {
        $bibliotecario = Bibliotecario::find($id);
        $bibliotecario->user->activo = !$bibliotecario->user->activo;
        $bibliotecario->user->save();
        return redirect()->route('home')->with('success', 'Cambio de estado exitoso');
    }
}
