<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nom'        => 'Informatique',
                'image'      => 'images/categories/informatique.jpg',
                'icon'       => 'laptop-code',
                'is_article' => 1,
                'is_cours'   => 1,
            ],
            [
                'nom'        => 'Marketing',
                'image'      => 'images/categories/marketing.jpg',
                'icon'       => 'bullhorn',
                'is_article' => 1,
                'is_cours'   => 1,
            ],
            [
                'nom'        => 'Langues',
                'image'      => 'images/categories/langues.jpg',
                'icon'       => 'language',
                'is_article' => 1,
                'is_cours'   => 1,
            ],
            [
                'nom'        => 'Sciences',
                'image'      => 'images/categories/sciences.jpg',
                'icon'       => 'flask',
                'is_article' => 1,
                'is_cours'   => 1,
            ],
            [
                'nom'        => 'Arts & Culture',
                'image'      => 'images/categories/arts.jpg',
                'icon'       => 'palette',
                'is_article' => 1,
                'is_cours'   => 0,  // uniquement des articles
            ],
            [
                'nom'        => 'Développement personnel',
                'image'      => 'images/categories/dp.jpg',
                'icon'       => 'user-graduate',
                'is_article' => 1,
                'is_cours'   => 1,
            ],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'nom'        => $cat['nom'],
                'image'      => $cat['image'],
                'icon'       => $cat['icon'],
                'is_article' => $cat['is_article'],
                'is_cours'   => $cat['is_cours'],
                'active'     => 1,
            ]);
        }
    }
}
