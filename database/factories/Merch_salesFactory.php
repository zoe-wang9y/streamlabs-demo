<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merch_sales>
 */
class Merch_salesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merch_id' => User::all()->random()->id,
            'buyer_id' => fake()->numberBetween(10000, 99999),
            'name' => fake()->userName(),
            'item_name' => fake()->randomElement(['pants', 'clothes', 'gifts', 'T-shirts', 'pens', 'pencils', 'skirts']),
            'quantity' => fake()->numberBetween(2,10),
            'price' => fake()->numberBetween(1, 100),
            'timestamp' => fake()->dateTimeInInterval("-90 days", "+90 days")
        ];
    }
}
