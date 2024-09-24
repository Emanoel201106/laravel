<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class LivrariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'name' => 'Harry Potter e a Pedra Filosofal',
            'author' => 'J.K. Rowling',
            'image' => 'livro1.png',
            'price' => '45.49',
            'desconto' => '59.90',
        ]);
        Produto::create([
            'name' => 'It: a Coisa',
            'author' => 'Stephen King',
            'image' => 'livro2.png',
            'price' => '85.71',
            'desconto' => '114.90',
        ]);
        Produto::create([
            'name' => 'Os Sete Maridos de Evelyn Hugo',
            'author' => 'Taylor Jenkins Reid',
            'image' => 'livro3.jpg',
            'price' => '27.90',
            'desconto' => '59.90',
        ]);
    }
}
