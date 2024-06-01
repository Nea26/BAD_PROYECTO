<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1=Role::create(['name' => 'bibliotecario']);
        $role2=Role::create(['name' => 'miembro']);
        $role3=Role::create(['name' => 'profesor']);
        Permission::create(['name' => 'home'])->assignRole($role1);
        Permission::create(['name' => 'register-user'])->assignRole($role1);
        Permission::create(['name' => 'bibliotecario.home.destroy'])->assignRole($role1);
        Permission::create(['name' => 'miembro.home.destroy'])->assignRole($role1);
        Permission::create(['name' => 'profesor.home.destroy'])->assignRole($role1);
        Permission::create(['name' => 'bibliotecario.home.cambiarEstado'])->assignRole($role1);
        Permission::create(['name' => 'bibliotecario.home.edit'])->assignRole($role1);
        Permission::create(['name' => 'bibliotecario.home.update'])->assignRole($role1);
        Permission::create(['name' => 'profesor.home.edit'])->assignRole($role1);
        Permission::create(['name' => 'profesor.home.update'])->assignRole($role1);
        Permission::create(['name' => 'miembro.home.edit'])->assignRole($role1);
        Permission::create(['name' => 'miembro.home.update'])->assignRole($role1);
    }
}
