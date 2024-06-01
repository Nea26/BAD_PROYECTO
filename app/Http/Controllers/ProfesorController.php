<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:profesor.home.destroy')->only('destroy');
        $this->middleware('can:profesor.home.edit')->only('edit');
        $this->middleware('can:profesor.home.update')->only('update');
        
    }
    //
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'Eliminacion exitosa');
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
            'NOMBRE' => $userData['nombre'],
            'APELLIDO' => $userData['apellido'],
            'DUI' => $request->dui,
            'TELEFONO' => $request->telefono,
            'CORREO' => $userData['email'],
        ];

        $profesor->update($profesorData);
        return redirect()->route('home')->with('success', 'Actualizacion exitosa');
    }
}
