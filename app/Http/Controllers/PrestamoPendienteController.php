<?php

namespace App\Http\Controllers;
use App\Models\PrestamoMiembro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        
        return view('devolverPrestamo',['prestamo' => $prestamo,'hoy' => $hoy]);

    }
    public function devolucion(Request $request, PrestamoMiembro $prestamo)
    {
        $prestamo->fecha_devuelto = $request->fechaDevuelto;
        $prestamo->devuelto = 1;
       
        $prestamo->save();

        return redirect()->route('prestamoPendiente.index');
    }
}
