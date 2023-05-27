<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory(20)->create([
            'name' => 'Test Admin',
             'email' => 'admin@example',
            'role' => 'admin'
        ]);

        User::factory(20)->create([
            'name' => 'Test Personnel',
            'email' => 'personnel@example.com',
            'role' => 'personnel'
        ]);
    }
}
