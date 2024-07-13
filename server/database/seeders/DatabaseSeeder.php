<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt('secret2'),
        ]);

        User::factory()->create([
            'email' => 'test3@example.com',
            'password' => bcrypt('secret3'),
        ]);

        User::factory()->create([
            'email' => 'test4@example.com',
            'password' => bcrypt('secret4'),
        ]);

        User::factory()->create([
            'email' => 'test5@example.com',
            'password' => bcrypt('secret5'),
        ]);
    }
}
