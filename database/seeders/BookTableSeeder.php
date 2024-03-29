<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Book;
Use App\Models\Writer;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $b = new Book;
        $b->id = '1';
        $b->order_id = '1';
        $b->b_name = 'power of mind';
        $b->b_description = 'A book is';
        $b->b_genre = 'Science';
        $b->b_price = '20';
        $b->b_no_of_copies = '3';
        $b->save();
        $b->writers()->attach(1);
        
        
        
       Book::factory()->count(10)->create();
    }
}
