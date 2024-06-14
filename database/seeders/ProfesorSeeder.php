<?php

namespace Database\Seeders;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Número de usuarios y profesores a crear
        $cantidad = 10;

        for ($i = 0; $i < $cantidad; $i++) {
            // Crear un usuario
            $user = User::factory()->create([
                'name' => "ProfesorUsuario{$i}",
                'email' => "profesorusuario{$i}@example.com",
                'password' => Hash::make('password'),
            ]);

            $data = [
                'nombre' => "Nombre{$i}",
                'apellido' => "Apellido{$i}",
                'dui' => '12345678' . $i, // Asegúrate de que sea único
                'telefono' => '123456789' . $i,
                'email' => $user->email,
            ];

            $counter = 0;
            do {
                $carnet_profesor = substr($data['apellido'], 0, 2) . substr($data['nombre'], 0, 2) . date('my') . ($counter > 0 ? $counter : '');
                $carnet_profesor = strtoupper($carnet_profesor);
                $counter++;
            } while (Profesor::where('CARNET_PROFESOR', $carnet_profesor)->exists());

            // Crear un profesor ligado al usuario
            Profesor::create([
                'CARNET_PROFESOR' => $carnet_profesor,
                'user_id' => $user->id,
                'NOMBRE' => $data['nombre'],
                'APELLIDO' => $data['apellido'],
                'DUI' => $data['dui'],
                'TELEFONO' => $data['telefono'],
                'CORREO' => $data['email'],
            ]);

            // Asignar el rol de profesor al usuario
            $user->assignRole('profesor');
        }
    }
}