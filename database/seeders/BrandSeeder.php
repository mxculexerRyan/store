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
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Rsuk',
                'brand_key'       => 'RSK',
                'brand_desc'      => 'Bidhaa za RSUK',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Kilimanjaro',
                'brand_key'       => 'KIL',
                'brand_desc'      => 'Bidhaa za Kilimanjaro',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Liper',
                'brand_key'       => 'LIP',
                'brand_desc'      => 'Bidhaa za Liper',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Tronic',
                'brand_key'       => 'TRK',
                'brand_desc'      => 'Bidhaa za Tronic',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Vallight',
                'brand_key'       => 'VAL',
                'brand_desc'      => 'Bidhaa za Vallight',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Klik',
                'brand_key'       => 'KLK',
                'brand_desc'      => 'Bidhaa za Klik',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Sephlighty',
                'brand_key'       => 'SPL',
                'brand_desc'      => 'Bidhaa za Sephlighty',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Ailyons',
                'brand_key'       => 'ALY',
                'brand_desc'      => 'Bidhaa za Ailyons',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Honour',
                'brand_key'       => 'HNR',
                'brand_desc'      => 'Bidhaa za Honour',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Torch',
                'brand_key'       => 'TCH',
                'brand_desc'      => 'Bidhaa za Torch',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Hippo',
                'brand_key'       => 'HIP',
                'brand_desc'      => 'Bidhaa za Hippo',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Voltaplus',
                'brand_key'       => 'VLT',
                'brand_desc'      => 'Bidhaa za Voltaplus',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Tan-Uk',
                'brand_key'       => 'TUK',
                'brand_desc'      => 'Bidhaa za Tan-Uk',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Euro Gold',
                'brand_key'       => 'EUG',
                'brand_desc'      => 'Bidhaa za Euro Gold',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Bravo',
                'brand_key'       => 'BRV',
                'brand_desc'      => 'Bidhaa za Bravo',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Kiboko',
                'brand_key'       => 'KBK',
                'brand_desc'      => 'Bidhaa za Kiboko',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Solatek',
                'brand_key'       => 'STK',
                'brand_desc'      => 'Bidhaa za Solatek',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Sundar',
                'brand_key'       => 'SDR',
                'brand_desc'      => 'Bidhaa za Sundar',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Euronics',
                'brand_key'       => 'EUR',
                'brand_desc'      => 'Bidhaa za Euronics',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'FIBIT',
                'brand_key'       => 'FBT',
                'brand_desc'      => 'Bidhaa za FIBIT',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Voltrix',
                'brand_key'       => 'VTX',
                'brand_desc'      => 'Bidhaa za Voltrix',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'JD SMP',
                'brand_key'       => 'JSP',
                'brand_desc'      => 'Bidhaa za JD SMP',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'CNC',
                'brand_key'       => 'CNC',
                'brand_desc'      => 'Bidhaa za CNC',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
            [
                'brand_name'      => 'Un-classified',
                'brand_key'       => 'UNC',
                'brand_desc'      => 'Un-classified Items',
                'created_at'      => date("Y-m-d H:i:s"),
                'updated_at'      => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
