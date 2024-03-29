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
            'name' => fake()->firstname,
            'description' => fake()->randomElement(["Nike","Adidas","World Balance","Puman","Fila","Reebok","Fila"]),
            'price' => fake()->numberBetween(10,999),
            'quantity' => fake()->numberBetween(10,500),
            'units' => fake()->name,
        ];
    }   
}
