<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // listado de miembros
        $miembros = DB::table('miembro')->get();
        // listado de bibliotecarios
        $bibliotecarios = DB::table('bibliotecario')
        ->join('users','bibliotecario.user_id','=','users.id')
        ->select('bibliotecario.*','users.activo')->get();
        // listado de profesores
        $profesores = DB::table('profesor')->get();

        return view('homeBibliotecario', [
            'profesores' => $profesores,
            'bibliotecarios' => $bibliotecarios,
            'miembros' => $miembros
        ]);
    }
    public function catalogoLibros()
    {
        return view('catalogoLibros');
    }
}
