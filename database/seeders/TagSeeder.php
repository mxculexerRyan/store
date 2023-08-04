<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'tag_name'      => 'Voucher',
                'tag_key'       => 'VCH',
                'tag_desc'      => 'Vocha za Jumla na reja reja',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Sigara',
                'tag_key'       => 'SGR',
                'tag_desc'      => 'Sigara za Jumla na reja reja',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Vinywaji',
                'tag_key'       => 'VNJ',
                'tag_desc'      => 'Vinywaji vya Jumla na reja reja',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
