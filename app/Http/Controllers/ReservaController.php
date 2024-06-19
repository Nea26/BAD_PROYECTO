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


class ReservaController extends Controller
{
    public function index()
    {
        $prestamos= PrestamoMiembro::get();
        return view('reservaciones',['prestamos' => $prestamos]);
    }
    public function show(PrestamoMiembro $prestamo)
    {
        return view('detalleReserva',['prestamo' => $prestamo]);
    }
    public function create()
    {
        return view('CrearReserva');
    }
    
    public function store(Request $request){
        $Libros = DB::table("libros")->where("codigo_internacional", $request->codigo)->first();
        if ($Libros == null) {
            return redirect()->route('reserva.create')->with('error', 'No se encontró el libro con el código ingresado');
        }
    
        $Miembro = DB::table("miembro")->where("CARNET_MIEMBRO", $request->carnet)->first();
        $Profesor = DB::table("profesor")->where("CARNET_PROFESOR", $request->carnet)->first();
        if ($Miembro == null && $Profesor == null) {
            return redirect()->route('reserva.create')->with('error', 'No se encontró el miembro o profesor con el carnet ingresado');
        }
    
        $prestamo = new PrestamoMiembro();
        $prestamo->id_ejemplar = $Libros->id;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->aprobado = 0;
    
        if ($Miembro != null) {
            $prestamo->id_user = $Miembro->user_id;
        } elseif ($Profesor != null) {
            $prestamo->id_user = $Profesor->user_id;
        }
    
        $prestamo->save();
        return redirect()->route('reserva.index');
    }

    
    public function edit(PrestamoMiembro $prestamo)
    {
        return view('editarReserva',['prestamo' => $prestamo]);
    }
    
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $Libros = DB::table("libros")->where("codigo_internacional", $request->codigo)->first();
        $Miembro = DB::table("miembro")->where("CARNET_MIEMBRO", $request->carnet)->first();
        $Profesor = DB::table("profesor")->where("CARNET_PROFESOR", $request->carnet)->first();
    
        if (!$Libros) {
            return redirect()->route('reserva.edit', ['prestamo' => $prestamo])->with('error', 'No se encontró el libro con el código proporcionado.');
        }
    
        if (!$Miembro && !$Profesor) {
            return redirect()->route('reserva.edit', ['prestamo' => $prestamo])->with('error', 'No se encontró un miembro o profesor con el carnet proporcionado.');
        }
    
        $prestamo->id_ejemplar = $Libros->id;
        $prestamo->carnet_miembro = $request->carnet;
        // Asignar id_user basado en si es miembro o profesor
        $prestamo->id_user = $Miembro ? $Miembro->user_id : $Profesor->user_id;
    
        $prestamo->save();
    
        return redirect()->route('reserva.index')->with('success', 'Reserva actualizada con éxito.');
    }
    public function destroy(PrestamoMiembro $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('reserva.index');
    }
    public function aprobar(PrestamoMiembro $prestamo)
    {
        $hoy = Carbon::now();
        $diaDevolucion=Carbon::now()->addDays(5);
        return view('aprobarReserva',['prestamo' => $prestamo,'hoy' => $hoy,'diaDevolucion' => $diaDevolucion]);
    }
    public function aprobacion(Request $request, PrestamoMiembro $prestamo)
    {
        $Libros=DB::table("libros")->where("codigo_internacional",$request->codigo)->first(); 
        if($Libros->cantidad_disponible<=0){
            return redirect()->route('reserva.aprobar',['prestamo'=>$prestamo,"error" => 'No hay ejemplares disponibles']);
        }else{
            $cantidad=$Libros->cantidad_disponible;
            $cantidad=$cantidad-1;
            $prestamo->aprobado=1;
            $prestamo->fecha_prestamo = $request->fechaPrestamo;
            $prestamo->fecha_devolucion = $request->fechaDevolucion;
            DB::table('libros')->where('codigo_internacional',$request->codigo)->update(['cantidad_disponible' => $cantidad]);
            $prestamo->save();
            return redirect()->route('reserva.index');
        }

    }
}
