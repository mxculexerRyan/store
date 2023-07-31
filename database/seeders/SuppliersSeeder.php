<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'supplier_name' => 'Hashhem Ibwe',
                'supplier_email' => 'ibwe@hasheem.com',
                'supplier_phone' => '(+255) 228-096-234',
                'supplier_location' => 'Musoma - Mara',
                'supplier_bank' => 'NBC',
                'supplier_account' => '4567-9545-9856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'supplier_name' => 'Jeff Bezos',
                'supplier_email' => 'jeff@bezos.com',
                'supplier_phone' => '(+255) 118-096-234',
                'supplier_location' => 'Musoma - Mara',
                'supplier_bank' => 'CRDB',
                'supplier_account' => '4511-9545-9856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'supplier_name' => 'Kareem Benzema',
                'supplier_email' => 'kareem@benzema.com',
                'supplier_phone' => '(+255) 611-096-234',
                'supplier_location' => 'Musoma - Mara',
                'supplier_bank' => 'NMB',
                'supplier_account' => '4567-1545-9856-9876',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
