<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lais',
            'email' => 'lais@gmail.com',
            'password' => bcrypt('123'),
            'admin' => '1',
            'user' => '0',
            'idade' => '21',
            'emprego' => 'Designer'
        ]);
        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('123'),
            'admin' => '0',
            'user' => '1',
            'idade' => '26',
            'emprego' => 'Programador'
        ]);
    }
}
