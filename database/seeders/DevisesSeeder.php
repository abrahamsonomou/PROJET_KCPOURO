<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevisesSeeder extends Seeder
{
    public function run(): void
    {
        $devises = [
            ['code_iso' => 'XOF', 'symbole' => 'CFA', 'nom' => 'Franc CFA BCEAO', 'nom_court' => 'Franc CFA'],
            ['code_iso' => 'GNF', 'symbole' => 'FG', 'nom' => 'Franc Guinéen', 'nom_court' => 'Franc Guinéen'],
            ['code_iso' => 'USD', 'symbole' => '$', 'nom' => 'Dollar Américain', 'nom_court' => 'Dollar'],
            ['code_iso' => 'EUR', 'symbole' => '€', 'nom' => 'Euro', 'nom_court' => 'Euro'],
            ['code_iso' => 'GHS', 'symbole' => '₵', 'nom' => 'Cedi Ghanéen', 'nom_court' => 'Cedi'],
        ];

        foreach ($devises as $devise) {
            DB::table('devises')->insert([
                'code_iso' => $devise['code_iso'],
                'symbole' => $devise['symbole'],
                'nom' => $devise['nom'],
                'nom_court' => $devise['nom_court'],
                'active' => 1,
            ]);
        }
    }
}
