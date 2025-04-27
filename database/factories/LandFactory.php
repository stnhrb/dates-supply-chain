<?php

namespace Database\Factories;

use Database\Seeders\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Land>
 */
class LandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => array_rand(Cities::getSaudiCities()),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'land_size' => $this->faker->numberBetween(1, 1000) + (rand(1, 100) / 100),
        ];
    }
}
