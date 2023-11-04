<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'order_id'=>fake()->numberBetween(1,4),
            'b_name'=>fake()->name(),
            'b_description'=>fake()->sentence(),
            'b_genre'=>fake()->word(),
            'b_price'=>fake()->randomFloat(2,0,100),
            'b_no_of_copies'=>fake()->numberBetween(1,5),
        ];
    }
}
