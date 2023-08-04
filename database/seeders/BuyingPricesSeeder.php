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
                'supplier_id'       => '1',
                'buying_price'      => '468',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '2',
                'supplier_id'       => '1',
                'buying_price'      => '936',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '3',
                'supplier_id'       => '1',
                'buying_price'      => '1872',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '4',
                'supplier_id'       => '1',
                'buying_price'      => '4680',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '5',
                'supplier_id'       => '1',
                'buying_price'      => '9360',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '6',
                'supplier_id'       => '2',
                'buying_price'      => '471',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '7',
                'supplier_id'       => '2',
                'buying_price'      => '942',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '8',
                'supplier_id'       => '2',
                'buying_price'      => '1884',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '9',
                'supplier_id'       => '2',
                'buying_price'      => '4710',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '10',
                'supplier_id'       => '2',
                'buying_price'      => '9420',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '11',
                'supplier_id'       => '3',
                'buying_price'      => '470',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '12',
                'supplier_id'       => '3',
                'buying_price'      => '940',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '13',
                'supplier_id'       => '3',
                'buying_price'      => '1880',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '14',
                'supplier_id'       => '3',
                'buying_price'      => '4700',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '15',
                'supplier_id'       => '3',
                'buying_price'      => '9400',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
