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
            'images' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2022/1/29/ac6b9868-bd65-4c33-a90c-1b7c95682403.jpg'

        ]);
        \App\Models\Product::create([
            'product_code' => 'SKUGIVBR',
            'product_name' => 'Giv Biru',
            'price' => 11000,
            'currency' => 'IDR',
            'discount' => 0,
            'dimension' => '5 cm x 8 cm',
            'unit' => 'PCS',
            'images' => 'https://www.mirotakampus.com/resources/assets/images/product_images/1643005574.giv_giv-biru-kotak-bar-soap--76-gr-_full02.jpg'

        ]);
        \App\Models\Product::create([
            'product_code' => 'SKUSKILNL',
            'product_name' => 'SO Klin Liquid',
            'price' => 18000,
            'currency' => 'IDR',
            'discount' => 0,
            'dimension' => '10 cm x 10 cm',
            'unit' => 'PCS',
            'images' => 'https://mysoklin-dashboard.efectifity.com/api/files/pzkj3c27zthykgj/qdg70vly3rxbc36/sk_liquid_red_16_AwtbGsVbM1.png'

        ]);

        \App\Models\TransactionHeader::create([
            'document_code' => 'TRX',
            'document_number' => 001,
            'user_id' => 1,
            'total' => 0,
            'date' => '2000-05-20'
        ]);
        \App\Models\TransactionHeader::create([
            'document_code' => 'TRX',
            'document_number' => 001,
            'user_id' => 2,
            'total' => 0,
            'date' => '2000-05-20'
        ]);
    }
}
