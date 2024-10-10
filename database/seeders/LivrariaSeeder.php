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
            'avaliação' => '(3293 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro1.png',
            'price' => '45.49',
            'desconto' => '59.90',
            'categoria' => 'Fantasia',
            'ano' => '1997',
        ]);
        Produto::create([
            'name' => 'It: a Coisa',
            'author' => 'Stephen King',
            'avaliação' => '(1338 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro2.png',
            'price' => '85.71',
            'desconto' => '114.90',
            'categoria' => 'Terror',
            'ano' => '1986',
        ]);
        Produto::create([
            'name' => 'Os Sete Maridos de Evelyn Hugo',
            'author' => 'Taylor Jenkins Reid',
            'avaliação' => '(9023 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro3.jpg',
            'price' => '27.90',
            'desconto' => '59.90',
            'categoria' => 'Romance',
            'ano' => '2017',
        ]);
        Produto::create([
            'name' => 'As Crônicas de Nárnia',
            'author' => 'C.S. Lewis',
            'avaliação' => '(9543 avaliações)',
            'estrelas' => '4stars.png',
            'image' => 'livro4.png',
            'price' => '49.90',
            'desconto' => '104.90',
            'categoria' => 'Aventura',
            'ano' => '1950',
        ]);
        Produto::create([
            'name' => 'A Culpa é das Estrelas',
            'author' => 'John Green',
            'avaliação' => '(5108 avaliações)',
            'estrelas' => '4stars.png',
            'image' => 'livro5.png',
            'price' => '45.10',
            'desconto' => '59.90',
            'categoria' => 'Drama',
            'ano' => '2012',
        ]);
        Produto::create([
            'name' => 'Percy Jackson',
            'author' => 'Rick Riordan',
            'avaliação' => '(8212 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro6.jpg',
            'price' => '35.76',
            'desconto' => '59.90',
            'categoria' => 'Fantasia e Aventura',
            'ano' => '2005',
        ]);
    }
}
