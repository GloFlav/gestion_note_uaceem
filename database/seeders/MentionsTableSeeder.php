<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MentionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $mentions = [
            'Informatique', 'Mathématiques', 'Physique', 'Chimie', 'Biologie', 'Économie', 'Gestion', 'Droit', 'Sciences politiques', 'Lettres'
        ];

        foreach ($mentions as $mention) {
            DB::table('mentions')->insert([
                'design' => $mention,
                'code' => $faker->unique()->bothify('??####'), // Generates a unique code
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
