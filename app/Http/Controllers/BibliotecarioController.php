<?php

namespace App\Http\Controllers;

use App\Models\Bibliotecario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BibliotecarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:bibliotecario.home.destroy')->only('destroy');
        $this->middleware('can:bibliotecario.home.cambiarEstado')->only('cambiarEstado');
        $this->middleware('can:bibliotecario.home.edit')->only('edit');
        $this->middleware('can:bibliotecario.home.update')->only('update');
    }
    //Eliminar bibliotecario
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'Eliminacion exitosa');
    }
    //Cambiar estado
    public function cambiarEstado($id)
    {
        $bibliotecario = Bibliotecario::find($id);
        $bibliotecario->user->activo = !$bibliotecario->user->activo;
        $bibliotecario->user->save();
        return redirect()->route('home')->with('success', 'Cambio de estado exitoso');
    }
    //Editar bibliotecario
    public function edit($id)
    {
        $bibliotecario = Bibliotecario::find($id);
        $user= User::find($bibliotecario->user_id);
        return view('/editarUsuarios/editarBibliotecario', ['bibliotecario' => $bibliotecario, 'user' => $user]);
    }
    public function show(string $id)
    {
        
    }
    //Actualizar bibliotecario
    public function update(Request $request, $id)
    {
        $user = User::find($id);
         $bibliotecario = Bibliotecario::where('user_id', $id)->first();
        

        // Actualiza los campos del usuario
        $userData = $request->only('nombre', 'apellido', 'name', 'password', 'email'); 

        // Si se proporcionó una nueva contraseña, hashea la contraseña antes de actualizar el usuario
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        // Actualiza los campos del bibliotecario
        $bibliotecarioData = [
            'NOMBRE' => $userData['nombre'],
            'APELLIDO' => $userData['apellido'],
            'USER_NAME' => $userData['name'],
            'PASSWORD' => $userData['password']
        ];

        $bibliotecario->update($bibliotecarioData);

        return redirect()->route('home')->with('success', 'Actualizacion exitosa');
    }
}
