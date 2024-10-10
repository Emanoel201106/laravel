<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categoria::create([
            'categoria' => 'categoria1.svg',
            'name' => 'Romance'
        ]);
        categoria::create([
            'categoria' => 'categoria2.svg',
            'name' => 'Terror'
        ]);
        categoria::create([
            'categoria' => 'categoria3.svg',
            'name' => 'Fantasia'
        ]);
        categoria::create([
            'categoria' => 'categoria4.svg',
            'name' => 'Aventura'
        ]);
        categoria::create([
            'categoria' => 'categoria5.svg',
            'name' => 'Infantil'
        ]);
        categoria::create([
            'categoria' => 'categoria6.svg',
            'name' => 'HQ'
        ]);
        categoria::create([
            'categoria' => 'categoria7.svg',
            'name' => 'Drama'
        ]);
        categoria::create([
            'categoria' => 'categoria8.svg',
            'name' => 'Nacional'
        ]);
    }
}
