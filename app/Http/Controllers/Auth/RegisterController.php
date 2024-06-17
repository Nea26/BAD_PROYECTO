<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bibliotecario;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\Miembro;
use App\Models\Profesor;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo(){
        return route('catalogo.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            

        ]);

        $form_type = $data['tipo'];

        if ($form_type == 'bibliotecario') {
            Bibliotecario::create([
                'user_id' => $user->id,
                'ID_MULTA' => null,
                'NOMBRE' => $data['nombre'],
                'APELLIDO' => $data['apellido'],
                'USER_NAME' => $data['name'],
                'PASSWORD' => Hash::make($data['password']),
            ]);
            $user->assignRole('bibliotecario');
        } 
        else if ($form_type == 'miembro') {
            $counter = 0;
            do {
                $carnet_miembro = substr($data['apellido'], 0, 2) . substr($data['nombre'], 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_miembro = strtoupper($carnet_miembro);
                $counter++;
            } while (Miembro::where('CARNET_MIEMBRO', $carnet_miembro)->exists());
            
            Miembro::create([
                'CARNET_MIEMBRO' => $carnet_miembro,
                'user_id' => $user->id,
                'NOMBRE' => $data['nombre'],
                'APELLIDO' => $data['apellido'],
                'FECHA_NACIMIENTO' => $data['fecha_nac'],
                'DOC_IDENTIFICACION' => $data['tipo_identificacion'],
                'NUM_DOC_IDENTIFICACION' => $data['num_identificacion'],
                'TELEFONO' => $data['telefono'],
                'CORREO' => $data['email'],
                'FECHA_MEMBRESIA' => date('Y-m-d'),
                'VIGENCIA' => date('Y-m-d', strtotime('+1 year')),
                'COSTO_CARNET' => 5.0,
                'PENALIZADO' => false,
            ]);
            $user->assignRole('miembro');
        } 
        else if ($form_type == 'profesor') {
            $counter = 0;
            do {
                $carnet_profesor = substr($data['apellido'], 0, 2) . substr($data['nombre'], 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_profesor = strtoupper($carnet_profesor);
                $counter++;
            } while (Profesor::where('CARNET_PROFESOR', $carnet_profesor)->exists());

            Profesor::create([
                'CARNET_PROFESOR' => $carnet_profesor,
                'user_id' => $user->id,
                'NOMBRE' => $data['nombre'],
                'APELLIDO' => $data['apellido'],
                'DUI' => $data['dui'],
                'TELEFONO' => $data['telefono'],
                'CORREO' => $data['email'],
            ]);
            $user->assignRole('profesor');
        }
        return $user;
    }
}
