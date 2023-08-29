<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
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
            'subscriber_id' => fake()->unique()->numberBetween(10000, 99999),
            'name' => fake()->unique()->userName(),
            'tier' => fake()->biasedNumberBetween(1,3),
            'subscribed_at' => fake()->dateTimeInInterval("-90 days", "+90 days")
        ];
    }
}
