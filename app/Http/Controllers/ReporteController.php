<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class ReporteController extends Controller
{
    //
    public function index()
    {
        // Cantidad de préstamos por miembros
        // Total de préstamos hechos por miembros
        $totalPrestamosMiembros = DB::table('prestamo_miembros')
            ->join('miembro', 'prestamo_miembros.carnet_miembro', '=', 'miembro.carnet_miembro')
            ->count();

        // Total de préstamos hechos por profesores
        $totalPrestamosProfesores = DB::table('prestamo_miembros')
            ->join('profesor', 'prestamo_miembros.carnet_miembro', '=', 'profesor.carnet_profesor')
            ->count();
        $totalPrestamosUsuarios = $totalPrestamosMiembros + $totalPrestamosProfesores;

        // Mayor cantidad de préstamos por miembro
        $mayorPrestamosMiembro = DB::table('prestamo_miembros')
            ->select('users.name', DB::raw('count(*) as total_prestamos'))
            ->join('miembro', 'prestamo_miembros.carnet_miembro', '=', 'miembro.carnet_miembro')
            ->join('users', 'miembro.user_id', '=', 'users.id')
            ->groupBy('users.name')
            ->orderBy('total_prestamos', 'desc')
            ->first();
            
        //Mayor cantidad de préstamos por profesor
        $mayorPrestamosProfesor = DB::table('prestamo_miembros')
            ->select('profesor.carnet_profesor', 'users.nombre', 'users.apellido', DB::raw('count(*) as total_prestamos'))
            ->join('profesor', 'prestamo_miembros.carnet_miembro', '=', 'profesor.carnet_profesor')
            ->join('users', 'profesor.user_id', '=', 'users.id')
            ->groupBy('profesor.carnet_profesor', 'users.nombre', 'users.apellido')
            ->orderBy('total_prestamos', 'desc')
            ->first();
            //Libro mas prestado
            $libroMasPrestado = DB::table('prestamo_miembros')
            ->select('libros.titulo', DB::raw('count(*) as total_prestamos'))
            ->join('libros', 'prestamo_miembros.id_ejemplar', '=', 'libros.id')
            ->groupBy('libros.titulo')
            ->orderBy('total_prestamos', 'desc')
            ->first();    
        // Pasar los resultados a la vista
        return view('reportes.estadisticas', [
            'libroMasPrestado' => $libroMasPrestado,
            'mayorPrestamoProfesor' => $mayorPrestamosProfesor,
            'mayorPrestamoMiembro' => $mayorPrestamosMiembro,
            'totalPrestamosMiembros' => $totalPrestamosMiembros,
            'totalPrestamosProfesores' => $totalPrestamosProfesores,
            'totalPrestamosUsuarios' => $totalPrestamosUsuarios
        ]);
    }
    public function pdf(){
        //Usuario activo
        $usuario = auth()->user();
        $usuario = explode(' ',$usuario->nombre)[0] . ' ' . explode(' ',$usuario->apellido)[0];

        // Cantidad de préstamos por miembros
        // Total de préstamos hechos por miembros
        $totalPrestamosMiembros = DB::table('prestamo_miembros')
            ->join('miembro', 'prestamo_miembros.carnet_miembro', '=', 'miembro.carnet_miembro')
            ->count();

        // Total de préstamos hechos por profesores
        $totalPrestamosProfesores = DB::table('prestamo_miembros')
            ->join('profesor', 'prestamo_miembros.carnet_miembro', '=', 'profesor.carnet_profesor')
            ->count();
        $totalPrestamosUsuarios = $totalPrestamosMiembros + $totalPrestamosProfesores;

        // Mayor cantidad de préstamos por miembro
        $mayorPrestamosMiembro = DB::table('prestamo_miembros')
            ->select('miembro.carnet_miembro', 'miembro.nombre', 'miembro.apellido', DB::raw('count(*) as total_prestamos'))
            ->join('miembro', 'prestamo_miembros.carnet_miembro', '=', 'miembro.carnet_miembro')
            ->join('users', 'miembro.user_id', '=', 'users.id')
            ->groupBy('miembro.carnet_miembro', 'users.nombre', 'users.apellido')
            ->orderBy('total_prestamos', 'desc')
            ->first();
            
        //Mayor cantidad de préstamos por profesor
        $mayorPrestamosProfesor = DB::table('prestamo_miembros')
            ->select('profesor.carnet_profesor', 'profesor.nombre', 'profesor.apellido', DB::raw('count(*) as total_prestamos'))
            ->join('profesor', 'prestamo_miembros.carnet_miembro', '=', 'profesor.carnet_profesor')
            ->join('users', 'profesor.user_id', '=', 'users.id')
            ->groupBy('profesor.carnet_profesor', 'users.nombre', 'users.apellido')
            ->orderBy('total_prestamos', 'desc')
            ->first();
            //Libro mas prestado
            $libroMasPrestado = DB::table('prestamo_miembros')
            ->select('libros.titulo', DB::raw('count(*) as total_prestamos'))
            ->join('libros', 'prestamo_miembros.id_ejemplar', '=', 'libros.codigo_internacional')
            ->groupBy('libros.titulo')
            ->orderBy('total_prestamos', 'desc')
            ->first();
            $data=[
                'libroMasPrestado' => $libroMasPrestado,
                'mayorPrestamoProfesor' => $mayorPrestamosProfesor,
                'mayorPrestamoMiembro' => $mayorPrestamosMiembro,
                'totalPrestamosMiembros' => $totalPrestamosMiembros,
                'totalPrestamosProfesores' => $totalPrestamosProfesores,
                'totalPrestamosUsuarios' => $totalPrestamosUsuarios,
                'usuario' => $usuario
            ];
        $pdf = PDF::loadView('reportes.pdf', $data);
        return $pdf->download('reporte.pdf');
    }
}
