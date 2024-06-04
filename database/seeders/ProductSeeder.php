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
                'product_name'      => '2 Way PVC Main Switch',
                'product_key'       => '2PMS',
                'product_desc'      => 'main switch njia mbili plastic',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => '3 Way PVC Main Switch',
                'product_key'       => '3PMS',
                'product_desc'      => 'main switch njia tatu plastic',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => '4 Way PVC Main Switch',
                'product_key'       => '4PMS',
                'product_desc'      => 'main switch njia nne plastic',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => '4 Way Metalic Main Switch',
                'product_key'       => '4MMS',
                'product_desc'      => 'main switch njia nne chuma',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'product_name'      => '6 Way PVC Main Switch',
                'product_key'       => '6PMS',
                'product_desc'      => 'main switch njia sita chuma',
                'brand_id'          => '1',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
