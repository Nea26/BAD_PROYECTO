<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Miembro;
use App\Models\Profesor;
use App\Models\PrestamoMiembro;
use App\Models\Categoria;
use App\Models\Idioma;
use App\Models\Autor;


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
        $user = auth()->user();
        $user = User::find($user->id);
        $mensajes = [];
        $cantidad = 0;

        if ($user->hasRole('miembro')) {
            $miembro = Miembro::where('user_id', $user->id)->first();
            if ($miembro) {
                list($cantidad, $mensajes) = $this->generarNotificaciones($miembro->CARNET_MIEMBRO, 'miembro');
            }
        } elseif ($user->hasRole('profesor')) {
            $profesor = Profesor::where('user_id', $user->id)->first();
            if ($profesor) {
                list($cantidad, $mensajes) = $this->generarNotificaciones($profesor->CARNET_PROFESOR, 'profesor');
            }
        }

        $libros = Libro::with(['categoria', 'autor', 'idioma'])
            ->where('cantidad_disponible', '>', 0)
            ->paginate(4);
        return view('catalogo', compact('libros', 'cantidad', 'mensajes'));
    }
    //
    private function generarNotificaciones($carnet, $tipoUsuario): array
    {
        $prestamos = PrestamoMiembro::join('libros', 'prestamo_miembros.id_ejemplar', '=', 'libros.id')
            ->where('carnet_miembro', $carnet)->where('devuelto', '0')
            ->get();

        $cantidad = $prestamos->isNotEmpty() ? count($prestamos) : 0;
        $mensajes = [];

        foreach ($prestamos as $prestamo) {
            date_default_timezone_set('America/El_Salvador');
            Carbon::setLocale('es');
            $fechaDevolucion = Carbon::parse($prestamo->fecha_devolucion);
            $fechaActual = Carbon::now();

            $diasRestantes = $fechaDevolucion->diffInDays($fechaActual, false);

            if ($diasRestantes >= 0 && $diasRestantes <= 2) {
                $fechaDevolucionFormateada = $fechaDevolucion->translatedFormat('j \\d\\e F');
                $mensaje = "Tienes hasta el {$fechaDevolucionFormateada} para devolver ";
                $mensaje .= $tipoUsuario == 'miembro' ? "el libro \"{$prestamo->titulo}\"." : "o ampliar el préstamo del libro \"{$prestamo->titulo}\".";
                $mensajes[] = $mensaje;
            }
        }

        return [$cantidad, $mensajes];
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
    public function edit($id): View
    {
        $categorias = Categoria::all();
        $idiomas = Idioma::all();
        $autores = Autor::all();
        $libro = Libro::with(['categoria', 'autor', 'idioma'])->find($id);

        return view('EditLibro', ['libro' => $libro, 'categorias' => $categorias, 'idiomas' => $idiomas, 'autores' => $autores]);
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
            ->orWhereHas('idioma', function ($query) use ($request) {
                $query->where('nombre_idioma', 'like', "%{$request->buscar_Libro}%");
            })
            ->orWhereHas('autor', function ($query) use ($request) {
                $query->where('nombre', 'like', "%{$request->buscar_Libro}%");
            })
            ->orWhereHas('categoria', function ($query) use ($request) {
                $query->where('nombre_categoria', 'like', "%{$request->buscar_Libro}%");
            })
            ->orWhere('cantidad_disponible', 'like', "%{$request->buscar_Libro}%")
            ->paginate(4);

        if ($libros->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No se encontraron libros con este parametro de busqueda.']);
        } else {
            return view('catalogo', compact('libros'));
        }
    }
}
