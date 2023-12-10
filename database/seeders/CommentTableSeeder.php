<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comments;
        $c->id = '1';
        $c->post_id = '1';
        $c->writer_id = '1';
        $c->c_messages = 'Good excellent';
        $c->save();

        Comments::factory()->count(10)->create();
    }
    
}
