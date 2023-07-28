<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            // [
            //     'items_quantity' => '10',
            //     'order_value'    => '23800',
            //     'paid_amount'    => '20000',
            //     'order_discount' => '3800',
            //     'shipping_fees'  => '200',
            //     'vat_fees'       => '4284',
            //     'order_type'     => 'order_out',
            //     'from'           => '1',
            //     'to'             => '1',
            //     'created_at'     => date("Y-m-d H:i:s"),
            //     'updated_at'     => date("Y-m-d H:i:s"),
            // ],
            [
                'items_quantity' => '10',
                'order_value'    => '23800',
                'paid_amount'    => '20000',
                'order_discount' => '3800',
                'shipping_fees'  => '200',
                'vat_fees'       => '4284',
                'order_type'     => 'oder_in',
                'from'           => '1',
                'to'             => '1',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
