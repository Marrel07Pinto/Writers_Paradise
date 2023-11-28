<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Writer;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'writer_id'=>Writer::factory(),
        ];
    }
    // public function book()
    // {
    //     return $this->afterCreating(function(Order $order)
    //     {
            
    //     });

    
    // }
}
