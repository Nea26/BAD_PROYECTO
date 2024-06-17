<?php

namespace App\Http\Controllers;
use App\Models\PrestamoMiembro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->aprobado=0;
        $prestamo->save();
        return redirect()->route('reserva.index');
    }
    public function edit(PrestamoMiembro $prestamo)
    {
        return view('editarReserva',['prestamo' => $prestamo]);
    }
    public function update(Request $request, PrestamoMiembro $prestamo)
    {
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->save();
        return redirect()->route('reserva.index');
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
        $prestamo->aprobado=1;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;
        $prestamo->fecha_devolucion = $request->fechaDevolucion;
        $prestamo->save();
        return redirect()->route('reserva.index');
    }
}
