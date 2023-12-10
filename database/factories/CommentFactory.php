<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\Post;
use App\Models\Writer;
Use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'=>Post::factory(),
            'writer_id'=>Writer::factory(),
            'c_messages'=>$this->faker->sentence(),
        ];
    }
}
