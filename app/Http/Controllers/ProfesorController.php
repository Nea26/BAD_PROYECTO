<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:profesor.home.destroy')->only('destroy');
        $this->middleware('can:profesor.home.edit')->only('edit');
        $this->middleware('can:profesor.home.update')->only('update');
        $this->middleware('can:profesor.home.buscar')->only('buscar');
        $this->middleware('can:profesor.home.show')->only('verProfesores');

        
    }
    //
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home/profesores')->with('success', 'Eliminacion exitosa');
    }
    public function search(Request $request)
    {
        $query = $request->get('query');
        $profesores = Profesor::where('nombre', 'like', "%{$query}%")
            ->orWhere('apellido', 'like', "%{$query}%")
            ->get();

        return response()->json($profesores);
    }
    public function show(string $id)
    {
    }
    public function verProfesores(){
        
        Paginator::useBootstrap();
        // listado de Profesores
    $profesores = DB::table('profesor')
    ->join('users', 'profesor.user_id', '=', 'users.id')
    ->select('profesor.*', 'users.nombre', 'users.apellido','users.email', 'users.activo')->paginate(5);
return view('administrarProfesores', [
    'profesores' => $profesores,
]);
    }
    //Cambiar estado
    public function cambiarEstado($id)
    {
        $user = User::find($id);
        $user->activo= !$user->activo;
        $user->save();
        return redirect()->route('home/profesores')->with('success', 'Cambio de estado exitoso');
    }
    //Editar profesor
    public function edit($user_id)
    {
        $profesor = Profesor::where('user_id', $user_id)->first();
        $user = User::find($profesor->user_id);
        return view('/editarUsuarios/editarProfesor', ['profesor' => $profesor, 'user' => $user]);
    }
    public function update(Request $request, $user_id)
    {
        $profesor = Profesor::where('user_id', $user_id)->first();
        $user = User::find($profesor->user_id);
        // Actualiza los campos del usuario
        $userData = $request->only('nombre', 'apellido', 'name', 'password', 'email');

        // Si se proporcionó una nueva contraseña, hashea la contraseña antes de actualizar el usuario
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        // Actualiza los campos del bibliotecario
        $profesorData = [
            
            'DUI' => $request->dui,
            'TELEFONO' => $request->telefono,
        
        ];

        $profesor->update($profesorData);
        return redirect()->route('home/profesores')->with('success', 'Actualizacion exitosa');
    }
    //Buscar profesor
    public function buscar(Request $request)
    {
        Paginator::useBootstrap();
        $profesores = DB::table('profesor')
    ->join('users', 'profesor.user_id', '=', 'users.id')
    ->where('users.NOMBRE', 'like', '%' . $request->buscar_Profesor . '%')
    ->orWhere('users.APELLIDO', 'like', '%' . $request->buscar_Profesor . '%')
    ->orWhere('profesor.CARNET_PROFESOR', 'like', '%' . $request->buscar_Profesor . '%')
    ->orderBy('users.NOMBRE', 'asc')
    ->paginate(5);
    if ($profesores->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No se encontraron resultados']);
    } else {
        return view('administrarProfesores', compact('profesores'));
    }
    }
    //Paginacion de profesores
    public function pagination(){
        Paginator::useBootstrap();
        $profesores = DB::table('profesor')
            ->join('users', 'profesor.user_id', '=', 'users.id')
            ->select('profesor.*','users.apellido','users.apellido', 'users.activo')->paginate(5);
            return view('paginacion/paginacionProf', compact('profesores'));
    }
}
