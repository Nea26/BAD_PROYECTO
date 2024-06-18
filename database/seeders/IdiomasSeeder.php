<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idiomas')->insert([
            ['nombre_idioma' => 'español'],
            ['nombre_idioma' => 'inglés'],
            ['nombre_idioma' => 'ruso'],
            ['nombre_idioma' => 'chino'],
            ['nombre_idioma' => 'francés'],
            ['nombre_idioma' => 'portugués'],
            ['nombre_idioma' => 'alemán'],
            ['nombre_idioma' => 'japonés'],
            ['nombre_idioma' => 'hindi'],
            ['nombre_idioma' => 'árabe'],
            ['nombre_idioma' => 'bengalí'],

        ]);
    }
    }
