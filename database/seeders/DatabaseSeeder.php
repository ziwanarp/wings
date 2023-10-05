<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::create([
            'name' => 'Smit Junior',
            'username' => 'Smit',
            'password' => bcrypt('_sm1t_OK'),
        ]);
        \App\Models\User::create([
            'name' => 'Admin Developer',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
