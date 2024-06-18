<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            ['nombre_categoria' => 'Libro', 'tipo_medio' => 'Físico'],
            ['nombre_categoria' => 'Revista', 'tipo_medio' => 'Físico'],
            ['nombre_categoria' => 'CD', 'tipo_medio' => 'Audio'],
            ['nombre_categoria' => 'DVD', 'tipo_medio' => 'Audio Visual'],
        ]);
    }
}
