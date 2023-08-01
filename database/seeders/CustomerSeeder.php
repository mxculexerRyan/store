<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Maulid Haruna',
                'customer_email' => 'maulid@store.com',
                'customer_phone' => '(+255) 678-096-234',
                'customer_location' => 'Musoma - Mara',
                'customer_bank' => 'NBC',
                'customer_account' => '4567-9545-9856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Makaranga Joseph',
                'customer_email' => 'makaranga@store.com',
                'customer_phone' => '(+255) 618-096-234',
                'customer_location' => 'Musoma - Mara',
                'customer_bank' => 'NBC',
                'customer_account' => '4567-9525-9856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Masanyiwa Juma',
                'customer_email' => 'masanyiwa@store.com',
                'customer_phone' => '(+255) 778-096-234',
                'customer_location' => 'Musoma - Mara',
                'customer_bank' => 'NBC',
                'customer_account' => '4567-9545-1856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
