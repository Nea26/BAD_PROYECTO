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
        $prestamo = new PrestamoMiembro();
        $Libros=DB::table("libros")->where("codigo_internacional",$request->codigo)->first();
        $Miembro=DB::table("miembro")->where("CARNET_MIEMBRO",$request->carnet)->first();
        $Profesor=DB::table("profesor")->where("CARNET_PROFESOR",$request->carnet)->first();
        if($Libros!=null && $Miembro!=null){
            $prestamo->id_ejemplar = $Libros->id;
            $prestamo->id_user =$Miembro->user_id; 
            $prestamo->carnet_miembro = $request->carnet;
            $prestamo->aprobado=0;
            $prestamo->save();
            return redirect()->route('reserva.index');

        }elseif($Libros!=null && $Profesor!=null){
            $prestamo->id_ejemplar = $Libros->id;
            $prestamo->id_user =$Profesor->user_id;
            $prestamo->carnet_miembro = $request->carnet;
            $prestamo->aprobado=0;
            $prestamo->save();
            return redirect()->route('reserva.index');
        }else{
            return redirect()->route('reserva.create',["error" => 'No se encontro el libro con el codigo ingresado']);
        }

    }
    public function edit(PrestamoMiembro $prestamo)
    {
        return view('editarReserva',['prestamo' => $prestamo]);
    }
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $Libros=DB::table("libros")->where("codigo_internacional",$request->codigo)->first();
        $Miembro=DB::table("miembro")->where("CARNET_MIEMBRO",$request->carnet)->first();  
        $Profesor=DB::table("profesor")->where("CARNET_PROFESOR",$request->carnet)->first();
        if($Libros!=null && $Miembro!=null){
            $prestamo->id_ejemplar = $Libros->id;
            $prestamo->id_user =$Miembro->user_id;
            $prestamo->carnet_miembro = $request->carnet;
            $prestamo->save();
            return redirect()->route('reserva.index');
        }elseif($Libros!=null && $Profesor!=null){
            $prestamo->id_ejemplar = $Libros->id;
            $prestamo->id_user =$Profesor->user_id;
            $prestamo->carnet_miembro = $request->carnet;
            $prestamo->save();
            return redirect()->route('reserva.index');
        }else{
            return redirect()->route('reserva.edit',['prestamo'=>$prestamo,"error" => 'No se encontro el libro con el codigo ingresado']);
        }

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
