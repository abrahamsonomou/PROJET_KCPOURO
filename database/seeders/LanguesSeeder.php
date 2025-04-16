<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        $langues = [
            ['code' => 'fr', 'nom' => 'Français', 'is_cours' => true],
            ['code' => 'en', 'nom' => 'Anglais', 'is_cours' => true],
            ['code' => 'pt', 'nom' => 'Portugais', 'is_cours' => false],
            ['code' => 'ar', 'nom' => 'Arabe', 'is_cours' => false],
            ['code' => 'mnk', 'nom' => 'Maninka', 'is_cours' => false], // Langue locale de Guinée
        ];

        foreach ($langues as $langue) {
            DB::table('langues')->insert([
                'code' => $langue['code'],
                'nom' => $langue['nom'],
                'is_cours' => $langue['is_cours'],
                'active' => true,
            ]);
        }
    }
}
