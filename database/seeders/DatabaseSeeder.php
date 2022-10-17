<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name' => 'Hunian',
        ]);Category::create([
            'name' => 'Industri',
        ]);Category::create([
            'name' => 'Komersil',
        ]);
        User::create([
            'name' => 'Admin123',
            'email' => 'Admin123@gmail.com',
            'password' => bcrypt('Admin123@')
        ]);
    }
}
