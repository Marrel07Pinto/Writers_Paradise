<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new User;
        $u->name = 'Keith';
        $u->email ='marrel@gmail.com';
        $u->password = 'Marrel@123';
        $u-> save();
        User::factory()->count(10)->create();
    }
}
