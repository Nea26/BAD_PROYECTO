<?php

namespace App\Http\Controllers;

use App\Models\PrestamoMiembro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('CrearPrestamo');
    }
    public function store(Request $request){
        $prestamo = new PrestamoMiembro();
        $prestamo->id_ejemplar = $request->codigo;
        $prestamo->carnet_miembro = $request->carnet;
        $prestamo->fecha_prestamo = $request->fechaPrestamo;

        $prestamo->fecha_devolucion = $request->fechaDevolucion;
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
        $prestamo->save();

        return redirect()->route('prestamo.index');
    }
    public function destroy(PrestamoMiembro $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamo.index');
    }
}
