<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bibliotecario;
use App\Models\Miembro;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosRegistroController extends Controller
{
    public function register(Request $request)
    {
        $form_type = $request->input('tipo');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nac' => 'required|date|before:-12 years',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),


        ]);

        if ($form_type == 'bibliotecario') {
            Bibliotecario::create([
                'user_id' => $user->id,
                'ID_MULTA' => null,
                'NOMBRE' => $request->input('nombre'),
                'APELLIDO' => $request->input('apellido'),
                'USER_NAME' => $request->input('name'),
                'PASSWORD' => Hash::make($request->input('password')),
            ]);
            $user->assignRole('bibliotecario');
        } else if ($form_type == 'miembro') {
            $fechaNacimiento = Carbon::parse($request->input('fecha_nac')); // Asume que 'fecha_nac' es el nombre del campo de la fecha de nacimiento en tu formulario
            $edad = $fechaNacimiento->age;

            if ($edad < 12) {
                // Maneja el error. Por ejemplo, podrías redirigir al usuario con un mensaje de error.
                return redirect()->back()->withErrors(['error' => 'La fecha de nacimiento indica una edad menor a 12 años.']);
            }
            $counter = 0;
            do {
                $carnet_miembro = substr($request->input('apellido'), 0, 2) . substr($request->input('nombre'), 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_miembro = strtoupper($carnet_miembro);
                $counter++;
            } while (Miembro::where('CARNET_MIEMBRO', $carnet_miembro)->exists());

            Miembro::create([
                'CARNET_MIEMBRO' => $carnet_miembro,
                'user_id' => $user->id,
                'NOMBRE' => $request->input('nombre'),
                'APELLIDO' => $request->input('apellido'),
                'FECHA_NACIMIENTO' => $request->input('fecha_nac'),
                'DOC_IDENTIFICACION' => $request->input('tipo_identificacion'),
                'NUM_DOC_IDENTIFICACION' => $request->input('num_identificacion'),
                'TELEFONO' => $request->input('telefono'),
                'CORREO' => $request->input('email'),
                'FECHA_MEMBRESIA' => date('Y-m-d'),
                'VIGENCIA' => date('Y-m-d', strtotime('+1 year')),
                'COSTO_CARNET' => 5.0,
                'PENALIZADO' => false,
            ]);
            $user->assignRole('miembro');
        } else if ($form_type == 'profesor') {
            $counter = 0;
            do {
                $carnet_profesor = substr($request->input('apellido'), 0, 2) . substr($request->input('nombre'), 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_profesor = strtoupper($carnet_profesor);
                $counter++;
            } while (Profesor::where('CARNET_PROFESOR', $carnet_profesor)->exists());

            Profesor::create([
                'CARNET_PROFESOR' => $carnet_profesor,
                'user_id' => $user->id,
                'NOMBRE' => $request->input('nombre'),
                'APELLIDO' => $request->input('apellido'),
                'DUI' => $request->input('dui'),
                'TELEFONO' => $request->input('telefono'),
                'CORREO' => $request->input('email'),
            ]);
            $user->assignRole('profesor');
        }
        return redirect()->back()->with('success', 'Usuario creado con éxito.');
    }
}
