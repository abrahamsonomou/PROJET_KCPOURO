<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Icone;

class IconesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icone::create([
            'nom' => 'icon-announcement'
        ]);

        Icone::create([
            'nom' => 'icon-web-programming'
        ]);

        Icone::create([
            'nom' => 'icon-design'
        ]);

        Icone::create([
            'nom' => 'icon-social-media'
        ]);

        Icone::create([
            'nom' => 'icon-photo-camera'
        ]);

        Icone::create([
            'nom' => 'icon-digital-art'
        ]);

        Icone::create([
            'nom' => 'icon-person'
        ]);

        Icone::create([
            'nom' => 'icon-tech'
        ]);
      
    }
}
