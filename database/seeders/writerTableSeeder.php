<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\writer;

class writerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $w = new writer;
        $w->w_firstname="Joy";
        $w->w_lastname="fernandes";
        $w->w_phone="9987878765";
        $w->w_address="Brigade metrapolis";
        $w->w_postcode="Sa 7pp";
        $w->save();
    }
}
