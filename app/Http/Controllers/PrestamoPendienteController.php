<?php

namespace App\Http\Controllers;
use App\Models\PrestamoMiembro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Random;
use Carbon\Carbon;


class PrestamoPendienteController extends Controller
{
    public function index()
    {
        $prestamos= PrestamoMiembro::get();

        return view('prestamospendientes',['prestamos' => $prestamos]);
    }

    public function show(PrestamoMiembro $prestamo)
    {

        return view('detallePrestamo',['prestamo' => $prestamo]);
    }
    public function edit(PrestamoMiembro $prestamo)
    {   
        return view('editarPrestamoPendiente',['prestamo' => $prestamo]);
        
    }
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;
        $prestamo->fecha_devolucion = $request->fechaDevolucion;
        if($request->devuelto){
            $prestamo->aprobado = 1;}
        else{
            $prestamo->aprobado = 0;
            $prestamo->fecha_prestamo = null;
            $prestamo->fecha_devolucion = null;
        }
        if($request->extenso){
            $prestamo->fecha_devolucion=Carbon::parse($request->fechaDevolucion)->addDays(5);
        }
        $prestamo->save();

        return redirect()->route('prestamoPendiente.index');
    }
    public function destroy(PrestamoMiembro $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamoPendiente.index');
    }
    public function devolver(PrestamoMiembro $prestamo)
    {
        $hoy = Carbon::now();
        $valorMulta=7;
         $fechaDevolucion = $prestamo->fecha_devolucion;
         if ($fechaDevolucion<$hoy) {
             $diferenciaEnDias = Carbon::parse($fechaDevolucion)->diffInDays(Carbon::now());
    //$diferenciaEnDias=$diferenciaEnDias+1;
    $multa = $diferenciaEnDias * $valorMulta;
         }else{
            $multa=0;

         }
    
        
        return view('devolverPrestamo',['prestamo' => $prestamo,'hoy' => $hoy,'multa' => $multa]);

    }
    public function devolucion(Request $request, PrestamoMiembro $prestamo)
    {
        $prestamo->fecha_devuelto = $request->fechaDevuelto;
        $prestamo->devuelto = 1;
        if ($request->multa>0) {
            $prestamo->monto_multa = $request->multa;
            $prestamo->id_multa=random_int(1000, 9999);
        }
        
        $prestamo->save();

        return redirect()->route('prestamoPendiente.index');
    }
}
