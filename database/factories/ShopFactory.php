<?php

namespace Database\Factories;

use Database\Seeders\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()-> firstNameMale() . "'s Shop",
            'city' => array_rand(Cities::getSaudiCities()),
            'sales' => fake()->numberBetween(10000, 100000) + (rand(1, 100) / 100),
        ];
    }
}
