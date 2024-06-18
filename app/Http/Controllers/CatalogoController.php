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
        //Para notificaciones de Prestamos
        $user = auth()->user();
        $user=User::find($user->id);
        if ($user->hasRole('miembro')) {
            
            $miembro = DB::table('miembro')
                ->where('user_id', $user->id)
                ->first(); // Usa first() para obtener un solo registro
        
            if ($miembro) {
                $carnet = $miembro->CARNET_MIEMBRO;
                $prestamos = DB::table('prestamo_miembros')
                    ->join('libros', 'prestamo_miembros.id_ejemplar', '=', 'libros.codigo_internacional')
                    ->where('carnet_miembro', $carnet)->where('devuelto', '0')
                    ->get();
        
                $cantidad = $prestamos->isNotEmpty() ? count($prestamos) : 0;
                $mensajes = [];
        
                $prestamos->each(function ($prestamo) use (&$mensajes) {
                    date_default_timezone_set('America/El_Salvador');
                    Carbon::setLocale('es');
                    $fechaPrestamo = Carbon::parse($prestamo->fecha_prestamo);
                    $fechaDevolucion = Carbon::parse($prestamo->fecha_devolucion);
                    $fechaActual = Carbon::now();
        
                    $diasRestantes = $fechaDevolucion->diffInDays($fechaActual);
        
                    $tituloLibro = $prestamo->titulo;
        
                    if ($diasRestantes >= 0 && $diasRestantes <= 2) {
                        $fechaDevolucionFormateada = $fechaDevolucion->translatedFormat('j \\d\\e F');
                        $mensajes[] = "Tienes hasta el {$fechaDevolucionFormateada} para devolver el libro \"{$tituloLibro}\".";
                    }
                });
        
                return view('catalogo', ['libros' => Libro::where('cantidad_disponible', '>', 0)->paginate(4)], compact('cantidad', 'mensajes'));
            }
        }
        else if($user->hasRole('profesor')){
             
            $profesor = DB::table('profesor')
                ->where('user_id', $user->id)
                ->first(); // Usa first() para obtener un solo registro
        
            if ($profesor) {
                $carnet = $profesor->CARNET_PROFESOR;
                $prestamos = DB::table('prestamo_miembros')
                    ->join('libros', 'prestamo_miembros.id_ejemplar', '=', 'libros.codigo_internacional')
                    ->where('carnet_miembro', $carnet)->where('devuelto', '0')
                    ->get();
        
                $cantidad = $prestamos->isNotEmpty() ? count($prestamos) : 0;
                $mensajes = [];
        
                $prestamos->each(function ($prestamo) use (&$mensajes) {
                    date_default_timezone_set('America/El_Salvador');
                    Carbon::setLocale('es');
                    $fechaPrestamo = Carbon::parse($prestamo->fecha_prestamo);
                    $fechaDevolucion = Carbon::parse($prestamo->fecha_devolucion);
                    $fechaActual = Carbon::now();
        
                    $diasRestantes = $fechaDevolucion->diffInDays($fechaActual);
        
                    $tituloLibro = $prestamo->titulo;
        
                    if ($diasRestantes >= 0 && $diasRestantes <= 2) {
                        $fechaDevolucionFormateada = $fechaDevolucion->translatedFormat('j \\d\\e F');
                        $mensajes[] = "Tienes hasta el {$fechaDevolucionFormateada} para devolver o ampliar el prestamo
                        del libro \"{$tituloLibro}\".";
                    }
                });
        
                return view('catalogo', ['libros' => Libro::where('cantidad_disponible', '>', 0)->paginate(4)], compact('cantidad', 'mensajes'));
            }
        }
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
