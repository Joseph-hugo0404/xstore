<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'credit_limit' => fake()->numberBetween(1000,10000)
        ];
    }
}
