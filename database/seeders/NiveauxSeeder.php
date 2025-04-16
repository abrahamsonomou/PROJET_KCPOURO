<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauxSeeder extends Seeder
{
    public function run(): void
    {
        $niveaux = [
            ['nom' => 'Tous niveaux'],
            ['nom' => 'Débutant'],
            ['nom' => 'Intermédiaire'],
            ['nom' => 'Avancé'],
            ['nom' => 'Expert'],
        ];

        foreach ($niveaux as $niveau) {
            DB::table('niveaux')->insert([
                'nom'    => $niveau['nom'],
                'active' => 1,
            ]);
        }
    }
}
