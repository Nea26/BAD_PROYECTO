<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Categorium;
use App\Models\Idioma;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Termwind\Components\Li;

class LibroController extends Controller
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
    public function index()
    {
        $categorias= Categoria::all();
        $idiomas=Idioma::all();
        $autores=Autor::all();
        return view('NuevoLibro',compact('categorias','idiomas','autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= Categoria::all();
        $idiomas=Idioma::all();
        $autores=Autor::all();
        return view('NuevoLibro',compact('categorias','idiomas','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {

        Libro::create([
            'titulo' => $request->titulo,
            'codigo_internacional' => $request->codigo_internacional,
            'id_autor' => $request->id_autor,
            'id_idioma' => $request->id_idioma,
            'id_categoria' => $request->id_categoria,
            'edicion' => $request->edicion,
            'cantidad_disponible' => $request->cantidad_disponible,
        ]);
        return redirect()->route('book.index')->with('success','Nuevo Libro creado con exito!');
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
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->update($request->all());
        return redirect()->route('catalogo.index')->with('success','Libro actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->route('catalogo.index')->with('success','Libro eliminado con exito!');
    }
}
