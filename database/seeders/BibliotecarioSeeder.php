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
        $user = User::create([
            'name' => 'bibliotecario',
            'email' => 'bibliotecario@gmail.com',
            'password' => Hash::make('Bibliotecario1$'),
            'nombre' => 'Juan Alejandro',
            'apellido' => 'Perez Lopez',
            

        ]);
        Bibliotecario::create([
            'user_id' => $user->id,
            'ID_MULTA' => null,
            'NOMBRE' => $user->nombre,
            'APELLIDO' => $user->apellido,
            'USER_NAME' => $user->name,
            'PASSWORD' => Hash::make($user->password),
        ]);
        $user->assignRole('bibliotecario');
        
    }
}