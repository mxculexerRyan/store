<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            [
                'brand_name'      => 'Airtel',
                'brand_key'       => 'AIR',
                'brand_desc'      => 'Vocha za Airtel',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Tigo',
                'brand_key'       => 'TGO',
                'brand_desc'      => 'Vocha za Tigo',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Vodacom',
                'brand_key'       => 'VDA',
                'brand_desc'      => 'Vocha za Vodacom',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'TTCL',
                'brand_key'       => 'TCL',
                'brand_desc'      => 'Vocha za TTCL',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Halotel',
                'brand_key'       => 'HLO',
                'brand_desc'      => 'Vocha za Halotel',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Zantel',
                'brand_key'       => 'ZTL',
                'brand_desc'      => 'Vocha za Zantel',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
