<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BuyingPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buying_prices')->insert([
            [
                'product_id'        => '1',
                'supplier_id'       => '3',
                'buying_price'      => '19500',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '2',
                'supplier_id'       => '3',
                'buying_price'      => '24000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '3',
                'supplier_id'       => '3',
                'buying_price'      => '26000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '4',
                'supplier_id'       => '3',
                'buying_price'      => '58000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '5',
                'supplier_id'       => '3',
                'buying_price'      => '68000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
