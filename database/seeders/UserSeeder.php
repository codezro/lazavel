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
        DB::table('users')->insert([
            'email' => 'seller@gmail.com',
            'username' => 'lazavelseller',
            'first_name' => 'lazavel',
            'last_name' => 'seller',
            'isSeller' => 1,
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
