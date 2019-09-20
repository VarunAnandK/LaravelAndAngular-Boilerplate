<?php

use Illuminate\Database\Seeder;

class user_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user_role')->insert([
            'id' => '1',
            'name' => "Super Admin",
            'created_by_id' => '1',
            'status' => '1'
        ]);
    }
}
