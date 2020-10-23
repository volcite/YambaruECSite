<?php

use Illuminate\Database\Seeder;

class UsersClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_classifications')->insert([
            'user_classification_name' => '出品者',
        ]);
        DB::table('users_classifications')->insert([
            'user_classification_name' => '購入者',
        ]);
        DB::table('users_classifications')->insert([
            'user_classification_name' => '管理者',
        ]);
    }
}
