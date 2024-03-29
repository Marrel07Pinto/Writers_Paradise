<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Writer;
use App\Models\Book;

class WriterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $w = new Writer;
        $w->user_id='1';
        $w->w_firstname = 'Keith';
        $w->w_phone = '9987656345';
        $w->w_address ='Brigade0123';
        $w->w_postcode ='SA1 1QA';
        $w->w_img ='1.jpg';
        $w->save();
        Writer::factory()->count(10)->create();
    }
}
