<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Writer;

class WriterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $w = new Writer;
        $w->w_firstname = 'Keith';
        $w->w_lastname = 'Pinto';
        $w->w_phone = '9987656345';
        $w->w_address ='Brigade0123';
        $w->w_postcode ='SA1 1QA';
        $w->save();

     //   Writer::factory()->count(10)->create();
    }
}
