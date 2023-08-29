<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Donations;
use App\Models\Follower;
use App\Models\Merch_sales;
use App\Models\Subscriber;
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

        // seed the rest of tables, randomly generate rows for each of those 2 users created above
        Follower::factory(800)->create();
        Donations::factory(800)->create();
        Subscriber::factory(800)->create();
        Merch_sales::factory(800)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
