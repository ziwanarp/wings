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

        \App\Models\Product::create([
            'product_code' => 'SKUSKILNP',
            'product_name' => 'SO klin Pewangi',
            'price' => 15000,
            'currency' => 'IDR',
            'discount' => 10,
            'dimension' => '13 cm x 10 cm',
            'unit' => 'PCS',

        ]);
        \App\Models\Product::create([
            'product_code' => 'SKUGIVBR',
            'product_name' => 'Giv Biru',
            'price' => 11000,
            'currency' => 'IDR',
            'discount' => 0,
            'dimension' => '5 cm x 8 cm',
            'unit' => 'PCS',

        ]);
        \App\Models\Product::create([
            'product_code' => 'SKUSKILNL',
            'product_name' => 'SO Klin Liquid',
            'price' => 18000,
            'currency' => 'IDR',
            'discount' => 0,
            'dimension' => '10 cm x 10 cm',
            'unit' => 'PCS',

        ]);
    }
}
