<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autor')->insert([
            ['nombre' => 'J. K. Rowling'],
            ['nombre' => 'Fujimoto Tatsuki'],
            ['nombre' => 'Clint Eastwood'],
            ['nombre' => 'Miguel de Cervantes'],
        ['nombre' => 'Marques de Sade'],
        ['nombre' => 'Jane Austen'],
        ['nombre' => 'Victor Hugo'],
        ['nombre' => 'Charles Dickens'],
        ['nombre' => 'Herman Melville'],
        ['nombre' => 'Steven Spielberg'],
        ['nombre' => 'Stanley Kubrick'],
        ['nombre' => 'Alfred Hitchcock'],
        ['nombre' => 'Martin Scorsese'],
        ['nombre' => 'Peter Jackson'],
        ['nombre' => 'Christopher Nolan'],
        ]);
    }
}
