<?php

use Illuminate\Database\Seeder;

class ShipmentsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipments_statuses')->insert([
            'shipment_status_name' => '未発送',
        ]);
        DB::table('shipments_statuses')->insert([
            'shipment_status_name' => '発送済',
        ]);
        DB::table('shipments_statuses')->insert([
            'shipment_status_name' => '入荷待ち',
        ]);
    }
}
