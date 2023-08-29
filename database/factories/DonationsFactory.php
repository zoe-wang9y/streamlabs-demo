<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donations>
 */
class DonationsFactory extends Factory
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
            'donator_id' => fake()->numberBetween(10000, 99999),
            'name' => fake()->userName(),
            'currency' => fake()->currencyCode(),
            'amount' => fake()->numberBetween(10, 1000),
            'message' => fake()->realTextBetween(10, 50),
            'timestamp' => fake()->dateTimeInInterval("-90 days", "+90 days")
        ];
    }
}
