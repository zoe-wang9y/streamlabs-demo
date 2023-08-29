<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'follower_id' => fake()->unique()->numberBetween(10000, 99999),
            'name' => fake()->unique()->userName(),
            'followed_at' => fake()->dateTimeInInterval("-90 days", "+90 days")
        ];
    }
}
