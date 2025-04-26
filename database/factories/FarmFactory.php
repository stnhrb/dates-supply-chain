<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()-> firstNameMale() . "'s Farm",
            'palm_count' => fake() -> biasedNumberBetween(min: 1000, max:10000),
            'dates_crop_in_kg' => fake()-> biasedNumberBetween(min: 100, max:1000),
        ];
    }
}
