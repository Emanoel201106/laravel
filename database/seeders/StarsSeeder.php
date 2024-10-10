<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\stars;

class StarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        stars::create([
            'stars' => 'stars.png'
        ]);
        stars::create([
            'stars' => '4stars.png'
        ]);
        stars::create([
            'stars' => '3stars.png'
        ]);
        stars::create([
            'stars' => '2stars.png'
        ]);
        stars::create([
            'stars' => '1star.png'
        ]);
    }
}
