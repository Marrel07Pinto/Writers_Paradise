<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\Book;
Use App\Models\Order;
Use App\Models\Writer;


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
    protected $model = Book::class;
    public function definition(): array
    {
        return [
            'order_id'=>Order::factory(),
            'b_name'=>$this->faker->name(),
            'b_description'=>$this->faker->sentence(),
            'b_genre'=>$this->faker->word(),
            'b_price'=>$this->faker->randomFloat(2,0,100),
            'b_no_of_copies'=>$this->faker->numberBetween(1,5),

        ];
    }
    public function configure()
    {
        
        return $this->afterCreating(function (Book $book) {
            // Attach a writer to the book
            $writers = Writer::factory(2)->create();
            foreach ($writers as $writer){
            $book->writers()->attach($writer->id);
            }
        });
    }
    public function Book()
    {
        return $this->BelongsTo(Order::class,'order_id');
        
    }
    
    

}

