<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillesGuineeSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère l'ID du pays "Guinée"
        $paysId = DB::table('pays')->where('nom', 'Guinée')->value('id');

        if (!$paysId) {
            $this->command->warn('Le pays "Guinée" n\'existe pas dans la table pays.');
            return;
        }

        $villes = [
            'Conakry',
            'Kindia',
            'Labé',
            'Kankan',
            'Nzérékoré',
            'Mamou',
            'Boké',
            'Faranah',
            'Dabola',
            'Siguiri',
            'Guéckédou',
            'Kissidougou',
            'Pita',
            'Dalaba',
            'Beyla',
            'Lélouma',
            'Tougué',
        ];

        foreach ($villes as $ville) {
            DB::table('villes')->insert([
                'pays_id' => $paysId,
                'nom' => $ville,
                'active' => true,
            ]);
        }
    }
}
