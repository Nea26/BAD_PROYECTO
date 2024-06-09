<?php

namespace Database\Seeders;

use App\Models\Bibliotecario;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BibliotecarioSeeder extends Seeder
{
    public function run()
    {
        // Número de usuarios y bibliotecarios a crear
        $cantidad = 10;

        for ($i = 0; $i < $cantidad; $i++) {
            // Crear un usuario
            $user = User::factory()->create([
                'name' => "Usuario{$i}",
                'email' => "usuario{$i}@example.com",
                'password' => Hash::make('password'),
                'nombre' => "Nombre{$i}",
                'apellido' => "Apellido{$i}",
            ]);

            // Crear un bibliotecario ligado al usuario
            $bibliotecario = Bibliotecario::create([
                'user_id' => $user->id,
                'ID_MULTA' => null,
                'NOMBRE' => $user->nombre,
                'APELLIDO' => $user->apellido,
                'USER_NAME' => $user->name,
                'PASSWORD' => $user->password, // Aquí se está guardando la contraseña hasheada del usuario
            ]);

            // Asignar el rol de bibliotecario al usuario
            // Asegúrate de que el método assignRole esté disponible y funcione como se espera.
            $user->assignRole('bibliotecario');
        }
    }
}