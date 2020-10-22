<?php

use Illuminate\Database\Seeder;

class SalesStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_statuses')->insert([
            'sale_status_name' => '販売中',
        ]);
        DB::table('sales_statuses')->insert([
            'sale_status_name' => '販売中止',
        ]);
        DB::table('sales_statuses')->insert([
            'sale_status_name' => '予約受付中',
        ]);
    }
}
