<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['nom' => 'Programmation',          'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Laravel',                'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'E‑commerce',             'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Entrepreneuriat',        'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Marketing digital',      'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'SEO',                    'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Design',                 'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'UX/UI',                  'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Photographie',           'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Musique',                'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Art',                    'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Science',                'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Technologie',            'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Innovation',             'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Leadership',             'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Finance',                'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Santé',                  'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Bien-être',              'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Voyage',                 'is_article' => 1, 'is_cours' => 1],
            ['nom' => 'Langues',                'is_article' => 1, 'is_cours' => 1],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'nom'         => $tag['nom'],
                'is_article'  => $tag['is_article'],
                'is_cours'    => $tag['is_cours'],
                'active'      => 1,
            ]);
        }
    }
}
