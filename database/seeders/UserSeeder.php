<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@store.com',
                'phone' => '0628665722',
                'role_id' => '1',
                'password' => Hash::make('user@123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'owner',
                'username' => 'owner',
                'email' => 'owner@store.com',
                'phone' => '0628665723',
                'role_id' => '2',
                'password' => Hash::make('owner@123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@store.com',
                'phone' => '0628665724',
                'role_id' => '3',
                'password' => Hash::make('admin@123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
