<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Writer;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Writer>
 */
class WriterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Writer::class;
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'w_firstname' => $this->faker-> name(),
            'w_lastname' => $this->faker-> name(),
            'w_phone' => $this->faker->phoneNumber(),
            'w_address' =>$this->faker ->address(),
            'w_postcode' =>$this->faker->postcode(),

        ];
    }
}
