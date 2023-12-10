<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\Writer;
use App\Models\Comment;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = $this->faker->word . '.' . $this->faker->fileExtension;
        return [
            'writer_id'=>Writer::factory(),
            'post_img'=> $fileName,
            'p_caption'=>$this->faker->sentence(),
            'p_likes'=>$this->faker->randomFloat(2,0,100),
        ];
    }
}
