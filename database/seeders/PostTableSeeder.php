<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $p = new Post;
       $p ->id ='1';
       $p->user_id='1';
       $p->post_img ='1.jpg';
       $p->p_caption ='old is gold';
       $p->p_likes = '5';
       $p->save();

       Post::factory()->count(10)->create();
    }
}
