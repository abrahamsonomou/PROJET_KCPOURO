<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitesSeeder extends Seeder
{
    public function run(): void
    {
        $specialites = [
            [
                'nom'         => 'Développement Web',
                'description' => 'Création et maintenance de sites et applications web',
            ],
            [
                'nom'         => 'Data Science',
                'description' => 'Collecte, analyse de données et machine learning',
            ],
            [
                'nom'         => 'Cybersécurité',
                'description' => 'Protection des systèmes d’information et des réseaux',
            ],
            [
                'nom'         => 'Marketing Digital',
                'description' => 'Stratégies de communication et publicité en ligne',
            ],
            [
                'nom'         => 'Gestion de Projet',
                'description' => 'Méthodologies Agile et suivi opérationnel de projets',
            ],
        ];

        foreach ($specialites as $spec) {
            DB::table('specialites')->insert([
                'nom'         => $spec['nom'],
                'description' => $spec['description'],
                'active'      => 1,
            ]);
        }
    }
}
