<?php

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
        $this->call(UsersClassificationsTableSeeder::class);
        $this->call(ShipmentsStatusesTableSeeder::class);
        $this->call(ProductsStatusesTableSeeder::class);
        $this->call(SalesStatusesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
