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
                'maximmum_qty'      => '100',
                'selling_price'     => '22000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '2',
                'maximmum_qty'      => '100',
                'selling_price'     => '26000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '3',
                'maximmum_qty'      => '100',
                'selling_price'     => '28000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '4',
                'maximmum_qty'      => '100',
                'selling_price'     => '60000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_id'        => '5',
                'maximmum_qty'      => '100',
                'selling_price'     => '70000',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
