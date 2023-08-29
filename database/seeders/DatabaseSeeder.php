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
        // pre-create 2 test users
        User::factory()->create([
            'name' => 'Andy',
            'email' => 'andy@example.com'
        ]);
        User::factory()->create([
            'name' => 'Lily',
            'email' => 'lily@example.com'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
