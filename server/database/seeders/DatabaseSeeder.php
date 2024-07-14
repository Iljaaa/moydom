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
            'email' => '123456@example.com',
            'password' => bcrypt('123456'),
        ]);

        User::factory()->create([
            'email' => 'love@example.com',
            'password' => bcrypt('love'),
        ]);

        User::factory()->create([
            'email' => 'sex@example.com',
            'password' => bcrypt('sex'),
        ]);

        User::factory()->create([
            'email' => 'test5@example.com',
            'password' => bcrypt('secret5'),
        ]);
    }
}
