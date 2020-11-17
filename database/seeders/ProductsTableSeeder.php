<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
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
                'product_name' => 'テスト商品名1 - ',

            ],
            [
                'product_name' => 'テスト商品名2 - ',
            ],
            [
                'product_name' => 'テスト商品名3 - ',
            ],
            [
                'product_name' => 'テスト商品名4 - ',
            ],
            [
                'product_name' => 'テスト商品名5 - ',
            ],
             [
                'product_name' => 'テスト商品名6 - ',
            ],
            [
                'product_name' => 'テスト商品名7 - ',
            ],
             [
                'product_name' => 'テスト商品名8 - ',
            ],
            [
                'product_name' => 'テスト商品名9 - ',
            ],
            [
                'product_name' => 'テスト商品名10 - ',
            ]

            ]);
    }
}





