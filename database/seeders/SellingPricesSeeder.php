<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SellingPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('selling_prices')->insert([
            [
                'product_id'        => '1',
                'maximmum_qty'      => '4',
                'selling_price'     => '500',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '1',
                'maximmum_qty'      => '499',
                'selling_price'     => '480',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '1',
                'maximmum_qty'      => '999',
                'selling_price'     => '475',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '1',
                'maximmum_qty'      => '2999',
                'selling_price'     => '473',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '1',
                'maximmum_qty'      => '4999',
                'selling_price'     => '471',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '1',
                'maximmum_qty'      => '50000',
                'selling_price'     => '470',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
