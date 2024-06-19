<?php

namespace App\Http\Controllers;

use App\Models\PrestamoMiembro;
use App\Models\Libro;
use App\Models\User;
use App\Models\Miembro;
use App\Models\Profesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos= PrestamoMiembro::get();

        return view('prestamo',['prestamos' => $prestamos]);
    }
    public function show(PrestamoMiembro $prestamo)
    {

        return view('detallePrestamo',['prestamo' => $prestamo]);
    }
    public function create()
    {
        $hoy = Carbon::now();
        $diaDevolucion=Carbon::now()->addDays(5);
        return view('CrearPrestamo',['hoy' => $hoy,'diaDevolucion' => $diaDevolucion,'hola'=>'']);
    }
    
    public function store(Request $request){
        $prestamo = new PrestamoMiembro();
        $Libros = DB::table("libros")->where("codigo_internacional", $request->codigo)->first();
        if ($Libros != null) {
            $cantidad = $Libros->cantidad_disponible;
            $Miembro = DB::table("miembro")->where("CARNET_MIEMBRO", $request->carnet)->first();
            $Profesor = DB::table("profesor")->where("CARNET_PROFESOR", $request->carnet)->first();
            if ($Miembro != null && $cantidad > 0) {
                $prestamo->id_ejemplar = $Libros->id;
                $prestamo->carnet_miembro = $request->carnet;
                $prestamo->id_user = $Miembro->user_id;
                $prestamo->fecha_prestamo = $request->fechaPrestamo;
                $prestamo->fecha_devolucion = $request->fechaDevolucion;
                $prestamo->aprobado = 1;
                $cantidad = $cantidad - 1;
                DB::table('libros')->where('id', $Libros->id)->update(['cantidad_disponible' => $cantidad]);
                $prestamo->save();
                return to_route('prestamo.index');
            } elseif ($Profesor != null && $cantidad > 0) {
                $prestamo->id_ejemplar = $Libros->id;
                $prestamo->carnet_miembro = $request->carnet;
                $prestamo->id_user = $Profesor->user_id;
                $prestamo->fecha_prestamo = $request->fechaPrestamo;
                $prestamo->fecha_devolucion = $request->fechaDevolucion;
                $prestamo->aprobado = 1;
                $cantidad = $cantidad - 1;
                DB::table('libros')->where('id', $Libros->id)->update(['cantidad_disponible' => $cantidad]);
                $prestamo->save();
                return to_route('prestamo.index');
            } else {
                return redirect()->route('prestamo.create')->with('error', 'No hay libros disponibles o no se encontró el miembro con el carnet ingresado');
            }
        } else {
            return redirect()->route('prestamo.create')->with('error', 'No se encontró el libro con el código ingresado');
        }
    }
           
    public function edit(PrestamoMiembro $prestamo)
    {
        return view('editarPrestamo',['prestamo' => $prestamo]);
        
    }
    
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $Libros = DB::table("libros")->where("codigo_internacional", $request->codigo)->first();
        $Miembro = DB::table("miembro")->where("CARNET_MIEMBRO", $request->carnet)->first();
        $Profesor = DB::table("profesor")->where("CARNET_PROFESOR", $request->carnet)->first();
    
        if (!$Libros) {
            return redirect()->route('prestamo.edit', ["prestamo" => $prestamo])->with('error', 'No se encontró el libro con el código proporcionado.');
        }
    
        if (!$Miembro && !$Profesor) {
            return redirect()->route('prestamo.edit', ["prestamo" => $prestamo])->with('error', 'No se encontró un miembro o profesor con el carnet proporcionado.');
        }
    
        // Asignar valores comunes
        $prestamo->id_ejemplar = $Libros->id;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;
        $prestamo->fecha_devolucion = $request->fechaDevolucion;
        $prestamo->fecha_devuelto = $request->fechaDevuelto;
    
        if ($request->devuelto) {
            $prestamo->devuelto = 1;
        } else {
            $prestamo->devuelto = 0;
            $prestamo->fecha_devuelto = null;
        }
    
        // Asignar id_user basado en si es miembro o profesor
        $prestamo->id_user = $Miembro ? $Miembro->user_id : $Profesor->user_id;
    
        $prestamo->save();
    
        return redirect()->route('prestamo.index')->with('success', 'Préstamo actualizado con éxito.');
    }
    public function destroy(PrestamoMiembro $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamo.index');
    }
}
