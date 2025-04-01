<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertfiedSteelProductsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'Product_name' => $this->faker->words(3, true), 
            'Certificate' => 'FSC-' . $this->faker->unique()->bothify('???-####'), 
            'Price' => $this->faker->randomFloat(2, 0.01, 99.99), 
            'About' => $this->faker->text(10), 
            'quantity' => $this->faker->numberBetween(1, 100), 
            'co2' => $this->faker->randomFloat(2, 0.01, 99.99), 
            'weight' => $this->faker->randomFloat(2, 0.01, 99.99) . ' ' . $this->faker->randomElement(['kg', 'lbs', 'g']),
            'weight_unit' => $this->faker->randomElement(['kg', 'lbs', 'g']), 
        ];
    }
}