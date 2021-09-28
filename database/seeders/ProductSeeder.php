<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Oppo Mobile',
                'price' => '500',
                'description' => 'A SmartPhone With 4 GB RAM and Lots of Advanced Features ',
                'category' => 'Mobile',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/71ZzqHNrwCL._SL1500_.jpg'
            ],
            [
                'name' => 'Sony TV',
                'price' => '13000',
                'description' => 'A Smart Television With Ultra HD 4K Picture Quality and Lots of Advanced Features ',
                'category' => 'TV',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/81bijHipk4L._SX522_.jpg'
            ],
            [
                'name' => 'Samsung Refrigerator',
                'price' => '2500',
                'description' => 'A Refrigerator With 13 Ione Cooling Capacity and Lots of Advanced Features ',
                'category' => 'Refrigerator',
                'gallery' => 'https://img.tatacliq.com/images/i6/1348Wx2000H/MP000000006323572_1348Wx2000H_20200905233722.jpeg'
            ],
            [
                'name' => 'Jaguar',
                'price' => '13000',
                'description' => 'A Car With Power Booster and Lots of Advanced Features ',
                'category' => 'Car',
                'gallery' => 'https://5.imimg.com/data5/PY/MI/BV/SELLER-10380492/82-500x500.jpg'
            ],
            [
                'name' => 'LG Mobile',
                'price' => '400',
                'description' => 'A SmartPhone With 8 GB RAM and Lots of Advanced Features ',
                'category' => 'Mobile',
                'gallery' => 'https://www.lg.com/in/mobile-phones/lg-lmk315im-plus'
            ]
        ]);
    }
}
