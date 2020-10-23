<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => '医薬品',
        ]);
        DB::table('categories')->insert([
            'category_name' => '食料品',
        ]);
        DB::table('categories')->insert([
            'category_name' => '日用品',
        ]);
        DB::table('categories')->insert([
            'category_name' => '事務用品',
        ]);
    }
}
