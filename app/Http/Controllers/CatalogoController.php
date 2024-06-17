<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;

class CatalogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $libros = Libro::where('cantidad_disponible', '>', 0)->paginate(4);
        return view('catalogo', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NuevoLibro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro): View
    {
        dd($libro);
        //return view('EditLibro',['Libro'=> $libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
    }
    //Buscar libros
    public function buscar(Request $request)
    {
        Paginator::useBootstrap();
        $libros = Libro::where('titulo', 'like', "%{$request->buscar_Libro}%")
            ->orWhere('codigo_internacional', 'like', "%{$request->buscar_Libro}%")
            ->orWhere('idioma', 'like', "%{$request->buscar_Libro}%")
            ->orWhere('edicion', 'like', "%{$request->buscar_Libro}%")
            ->orWhere('cantidad_disponible', 'like', "%{$request->buscar_Libro}%")
            ->paginate(4);
        if ($libros->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No se encontraron libros con este parametro de busqueda.']);
        } else {
            return view('catalogo', compact('libros'));
        }
    }
}
