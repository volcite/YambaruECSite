<?php

use Illuminate\Database\Seeder;

class ProductsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_statuses')->insert([
            'product_status_name' => '在庫有',
        ]);
        DB::table('products_statuses')->insert([
            'product_status_name' => '在庫無',
        ]);
        DB::table('products_statuses')->insert([
            'product_status_name' => '入荷待ち',
        ]);
        DB::table('products_statuses')->insert([
            'product_status_name' => '入荷未定',
        ]);
    }
}
