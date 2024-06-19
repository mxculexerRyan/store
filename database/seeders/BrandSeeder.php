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
                'brand_name'      => 'Rsuk',
                'brand_key'       => 'RSK',
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
            [
                'brand_name'      => 'Tronic',
                'brand_key'       => 'TRK',
                'brand_desc'      => 'Bidhaa za Tronic',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Vallight',
                'brand_key'       => 'VAL',
                'brand_desc'      => 'Bidhaa za Vallight',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Klik',
                'brand_key'       => 'KLK',
                'brand_desc'      => 'Bidhaa za Klik',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Sephlighty',
                'brand_key'       => 'SPL',
                'brand_desc'      => 'Bidhaa za Sephlighty',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Ailyons',
                'brand_key'       => 'ALY',
                'brand_desc'      => 'Bidhaa za Ailyons',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Honour',
                'brand_key'       => 'HNR',
                'brand_desc'      => 'Bidhaa za Honour',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Torch',
                'brand_key'       => 'TCH',
                'brand_desc'      => 'Bidhaa za Torch',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Hippo',
                'brand_key'       => 'HIP',
                'brand_desc'      => 'Bidhaa za Hippo',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Voltaplus',
                'brand_key'       => 'VLT',
                'brand_desc'      => 'Bidhaa za Voltaplus',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Tan-Uk',
                'brand_key'       => 'TUK',
                'brand_desc'      => 'Bidhaa za Tan-Uk',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Euro Gold',
                'brand_key'       => 'EUG',
                'brand_desc'      => 'Bidhaa za Euro Gold',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Bravo',
                'brand_key'       => 'BRV',
                'brand_desc'      => 'Bidhaa za Bravo',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Kiboko',
                'brand_key'       => 'KBK',
                'brand_desc'      => 'Bidhaa za Kiboko',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Solatek',
                'brand_key'       => 'STK',
                'brand_desc'      => 'Bidhaa za Solatek',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Sundar',
                'brand_key'       => 'SDR',
                'brand_desc'      => 'Bidhaa za Sundar',
                'tag_id'          => '1',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
