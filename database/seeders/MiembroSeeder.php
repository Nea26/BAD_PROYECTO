<?php

namespace Database\Seeders;

use App\Models\Miembro;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MiembroSeeder extends Seeder
{
    public function run()
    {
        // Número de usuarios y miembros a crear
        $cantidad = 10;

        for ($i = 0; $i < $cantidad; $i++) {
            // Crear un usuario
            $user = User::factory()->create([
                'name' => "MiembroUsuario{$i}",
                'email' => "miembrousuario{$i}@example.com",
                'password' => Hash::make('password'),
                // Asegúrate de que el factory de User incluya 'nombre' y 'apellido' si es necesario
                'nombre' => "Nombre{$i}",
                'apellido' => "Apellido{$i}",
            ]);

            $counter = 0;
            do {
                $carnet_miembro = substr($user->apellido, 0, 2) . substr($user->nombre, 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_miembro = strtoupper($carnet_miembro);
                $counter++;
            } while (Miembro::where('CARNET_MIEMBRO', $carnet_miembro)->exists());

            // Crear un miembro ligado al usuario
            $miembro = Miembro::create([
                'CARNET_MIEMBRO' => $carnet_miembro,
                'user_id' => $user->id,
                'NOMBRE' => $user->nombre,
                'APELLIDO' => $user->apellido,
                'FECHA_NACIMIENTO' => '1990-01-01', // Fecha de nacimiento genérica
                'DOC_IDENTIFICACION' => 'DNI',
                'NUM_DOC_IDENTIFICACION' => '12345678' . $i, // Asegúrate de que sea único
                'TELEFONO' => '123456789' . $i,
                'CORREO' => $user->email,
                'FECHA_MEMBRESIA' => date('Y-m-d'),
                'VIGENCIA' => date('Y-m-d', strtotime('+1 year')),
                'COSTO_CARNET' => 5.0,
                'PENALIZADO' => false,
            ]);

            // Asignar el rol de miembro al usuario
            // Asegúrate de que el método assignRole esté disponible y funcione como se espera.
            $user->assignRole('miembro');
        }
    }
}