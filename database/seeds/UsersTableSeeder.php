<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'last_name' => 'aaa',
            'first_name' => 'aaa',
            'zipcode' => '1234567',
            'prefecture' => 'aaa',
            'municipality' => 'aaa',
            'address' => 'aaa',
            'apartments' => 'aaa',
            'email' => 'aaa@aaa.com',
            'phone_number' => '123456789',
            'user_classification_id' => '1',
            'delete_flag' => '0',
            'password' => bcrypt('aaaaaaaa')
        ]);
    }
}
