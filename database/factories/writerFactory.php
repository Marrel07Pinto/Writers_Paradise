<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\wrwriter>
 */
class writerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'w_firstname' => fake()->firstname(),
            'w_lastname' =>fake()->lastname(),
            'w_phone'=>fake()->unique()->phoneNumber(),
            'w_address'=>fake()->address(),
            'w_postcode'=>fake()->postcode(),


        ];
    }
}
