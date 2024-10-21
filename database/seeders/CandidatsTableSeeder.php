<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CandidatsTableSeeder extends Seeder
{
    public function run()
    {
        $mentions = DB::table('mentions')->whereIn('id', [14, 15, 16, 17])->get();
        $series = [2, 3, 4, 5, 6];
        $currentYear = date('Y');

        foreach (range(1, 20) as $i) {
            // Randomly select a mention and get its id and code
            $mention = $mentions->random();
            $mention_id = $mention->id;
            $mention_code = $mention->code;

            $serie_id = $series[array_rand($series)];
            $mode_inscription = ['local', 'en_ligne'][array_rand(['local', 'en_ligne'])];
            $ref_mvola = $mode_inscription === 'en_ligne' ? Str::random(10) : null;
            $status = null;  // status is null by default

            // Generate num_conc using the mention code
            $num_conc = str_pad($i, 2, '0', STR_PAD_LEFT) . "/conc-$mention_code/$currentYear";

            DB::table('candidats')->insert([
                'mention_id' => $mention_id,
                'serie_id' => $serie_id,
                'nom' => 'Nom ' . $i,
                'num_bacc' => 'BAC' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'anne_bacc' => $currentYear - rand(1, 5),
                'tel' => '034' . rand(1000000, 9999999),
                'num_conc' => $num_conc,
                'email' => "candidat{$i}@example.com",
                'preuve_bacc' => 'preuve_bacc_' . $i . '.pdf',
                'status' => $status,
                'ref_mvola' => $ref_mvola,
                'mode_inscription' => $mode_inscription,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
