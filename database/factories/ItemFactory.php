<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'barcode' => fake()->ean13,
            'name' => fake()->words(2,true),
            'description' => fake()->words(6, true),
            'price' => fake()->numberBetween(10,999),
            'quantity' => fake()->numberBetween(10,500),
            'units' => fake()->randomElement(["pieces","grams","kilograms","bottles","boxes","litres","meters","inches","packs","bundles","gallons"])
        ];
    }
}
