<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@kpcouro.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'Student User',
            'email' => 'student@kpcouro.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
        
        User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@kpcouro.com',
            'password' => bcrypt('password'),
            'role' => 'instructor',
        ]);
        
    }
}
