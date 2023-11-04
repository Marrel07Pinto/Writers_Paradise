<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\wrbook>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'b_name'=> fake()->unique()->sentence(),
            'b_description'=> fake()->sentence(),
            'b_genre'=> fake()->word(),
            'b_price'=> fake()->randomFloat(2,10,50),
            'b_no_of_copies'=> fake()->numberBetween(1,20),
        ];
    }
}

