<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => "Super Admin",
            'user_name' => "sadmin",
            'user_role_id' => 1,
            'password' => Crypt::encrypt('123'),
            'email' => 'alpha@gmail.com',
            'created_by_id' => '1',
            'status' => '1'
        ]);
    }
}
