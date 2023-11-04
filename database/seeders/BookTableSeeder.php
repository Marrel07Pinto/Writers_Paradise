<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $b = new Book;
       $b ->b_name="Computer";
       $b ->b_description="A book about computer";
       $b ->b_genre="Science";
       $b ->b_price="30";
       $b ->b_no_of_copies="2";
       $b->save();

      Book::factory()->count(20)->create();
    }
}
