<?php

namespace App\Http\Controllers;

use App\Models\PrestamoMiembro;

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
        return view('CrearPrestamo',['hoy' => $hoy,'diaDevolucion' => $diaDevolucion]);
    }
    public function store(Request $request){
        $prestamo = new PrestamoMiembro();
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;
        $prestamo->fecha_devolucion = $request->fechaDevolucion;
        $prestamo->aprobado = 1;
        $prestamo->save();

        return to_route('prestamo.index');
    }
    public function edit(PrestamoMiembro $prestamo)
    {
        return view('editarPrestamo',['prestamo' => $prestamo]);
        
    }
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;
        $prestamo->fecha_devolucion = $request->fechaDevolucion;
        $prestamo->fecha_devuelto = $request->fechaDevuelto;
        if($request->devuelto){
            $prestamo->devuelto=1;
        }else{
            $prestamo->devuelto=0;
            $prestamo->fecha_devuelto = null;

        }
        $prestamo->save();

        return redirect()->route('prestamo.index');
    }
    public function destroy(PrestamoMiembro $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamo.index');
    }
}
