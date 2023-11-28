<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $o = new Order;
       $o ->id ='1';
       $o->writer_id='1';
        $o->save();
        Order::factory()->count(10)->create();
    }
}
