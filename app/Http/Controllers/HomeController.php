<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // listado de bibliotecarios
        $bibliotecarios = DB::table('bibliotecario')
            ->join('users', 'bibliotecario.user_id', '=', 'users.id')
            ->select('bibliotecario.*','users.nombre','users.apellido', 'users.activo')->paginate(5);
        return view('homeBibliotecario', [
            'bibliotecarios' => $bibliotecarios,

        ]);
    }
   
}
