<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaysSeeder extends Seeder
{
    public function run(): void
    {
        $pays = [
            ['nom' => 'Bénin', 'code_iso' => 'BJ', 'indicatif' => '+229', 'nationnalite' => 'Béninoise'],
            ['nom' => 'Burkina Faso', 'code_iso' => 'BF', 'indicatif' => '+226', 'nationnalite' => 'Burkinabè'],
            ['nom' => 'Cap-Vert', 'code_iso' => 'CV', 'indicatif' => '+238', 'nationnalite' => 'Cap-verdienne'],
            ['nom' => 'Côte d\'Ivoire', 'code_iso' => 'CI', 'indicatif' => '+225', 'nationnalite' => 'Ivoirienne'],
            ['nom' => 'Gambie', 'code_iso' => 'GM', 'indicatif' => '+220', 'nationnalite' => 'Gambienne'],
            ['nom' => 'Ghana', 'code_iso' => 'GH', 'indicatif' => '+233', 'nationnalite' => 'Ghanéenne'],
            ['nom' => 'Guinée', 'code_iso' => 'GN', 'indicatif' => '+224', 'nationnalite' => 'Guinéenne'],
            ['nom' => 'Guinée-Bissau', 'code_iso' => 'GW', 'indicatif' => '+245', 'nationnalite' => 'Bissau-Guinéenne'],
            ['nom' => 'Libéria', 'code_iso' => 'LR', 'indicatif' => '+231', 'nationnalite' => 'Libérienne'],
            ['nom' => 'Mali', 'code_iso' => 'ML', 'indicatif' => '+223', 'nationnalite' => 'Malienne'],
            ['nom' => 'Niger', 'code_iso' => 'NE', 'indicatif' => '+227', 'nationnalite' => 'Nigérienne'],
            ['nom' => 'Nigeria', 'code_iso' => 'NG', 'indicatif' => '+234', 'nationnalite' => 'Nigériane'],
            ['nom' => 'Sénégal', 'code_iso' => 'SN', 'indicatif' => '+221', 'nationnalite' => 'Sénégalaise'],
            ['nom' => 'Sierra Leone', 'code_iso' => 'SL', 'indicatif' => '+232', 'nationnalite' => 'Sierra-Léonaise'],
            ['nom' => 'Togo', 'code_iso' => 'TG', 'indicatif' => '+228', 'nationnalite' => 'Togolaise'],
        ];

        foreach ($pays as $p) {
            DB::table('pays')->insert([
                'nom' => $p['nom'],
                'code_iso' => $p['code_iso'],
                'indicatif' => $p['indicatif'],
                'nationnalite' => $p['nationnalite'],
                'active' => true,
            ]);
        }
    }
}
