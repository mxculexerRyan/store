<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name'      => 'Airtel Nusu',
                'product_key'       => 'AT00',
                'product_desc'      => 'Airtel za Jero Jero',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Airtel Moja',
                'product_key'       => 'AT01',
                'product_desc'      => 'Airtel za Buku Buku',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Airtel Mbili',
                'product_key'       => 'AT02',
                'product_desc'      => 'Airtel za Buku Mbili',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Airtel Tano',
                'product_key'       => 'AT05',
                'product_desc'      => 'Airtel za Buku Tano',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Airtel Kumi',
                'product_key'       => 'AT10',
                'product_desc'      => 'Airtel za buku Kumi',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Tigo Nusu',
                'product_key'       => 'TG00',
                'product_desc'      => 'Tigo za Jero Jero',
                'brand_id'          => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Tigo Moja',
                'product_key'       => 'TG01',
                'product_desc'      => 'Tigo za Buku Buku',
                'brand_id'          => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Tigo Mbili',
                'product_key'       => 'TG02',
                'product_desc'      => 'Tigo za Buku Mbili',
                'brand_id'          => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Tigo Tano',
                'product_key'       => 'TG05',
                'product_desc'      => 'Tigo za Buku Tano',
                'brand_id'          => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Tigo Kumi',
                'product_key'       => 'TG10',
                'product_desc'      => 'Airtel za Buku Kumi',
                'brand_id'          => '2',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Vodacom Nusu',
                'product_key'       => 'VD00',
                'product_desc'      => 'Vodacom za Jero Jero',
                'brand_id'          => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Vodacom Moja',
                'product_key'       => 'VD01',
                'product_desc'      => 'Vodacom za Buku Buku',
                'brand_id'          => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Vodacom Mbili',
                'product_key'       => 'VD02',
                'product_desc'      => 'Vodacom za Buku Mbili',
                'brand_id'          => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Vodacom Tano',
                'product_key'       => 'VD05',
                'product_desc'      => 'Vodacom za Buku Tano',
                'brand_id'          => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => 'Vodacom Kumi',
                'product_key'       => 'VD10',
                'product_desc'      => 'Vodacom za Buku Kumi',
                'brand_id'          => '3',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
