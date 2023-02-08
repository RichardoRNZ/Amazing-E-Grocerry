<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Grocery',
            'role_id' =>1,
            'gender_id'=>1,
            'email' =>'admin@gmail.com',
            'display_picture_link' => 'Richardo Wijaya.jpg1675847507.jpg',
            'password' => Hash::make("12345678")


        ]);

    }
}
