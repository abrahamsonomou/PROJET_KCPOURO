<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(IconesSeeder::class);
        $this->call(PaysSeeder::class);
        $this->call(VillesGuineeSeeder::class);
        $this->call(LanguesSeeder::class);
        $this->call(DevisesSeeder::class);
        $this->call(NiveauxSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(SpecialitesSeeder::class);

    }
}
