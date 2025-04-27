<?php

namespace Database\Factories;

use Database\Seeders\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesPerson>
 */
class SalesPersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['M', 'F'][array_rand(['M', 'F'])];

        return [
            'name' => fake()-> firstName(gender: $gender),
            'gender' => $gender,
            'phone_number' => fake()->phoneNumber(),
            'salary' => fake()->numberBetween(1000, 10000) + (rand(1, 100) / 100),
        ];
    }
}
