<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $series = [
            'S', 'ES', 'L', 'STMG', 'STI2D', 'ST2S', 'STL', 'STAV',
        ];

        foreach ($series as $serie) {
            DB::table('series')->insert([
                'design' => $serie,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
