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
                'brand_name'      => 'Africab',
                'brand_key'       => 'AFB',
                'brand_desc'      => 'Bidhaa za Africab',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'RSUK',
                'brand_key'       => 'RSUK',
                'brand_desc'      => 'Bidhaa za RSUK',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Kilimanjaro',
                'brand_key'       => 'KIL',
                'brand_desc'      => 'Bidhaa za Kilimanjaro',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Liper',
                'brand_key'       => 'LIP',
                'brand_desc'      => 'Bidhaa za Liper',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
