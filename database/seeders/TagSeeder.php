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
                'tag_name'      => 'Vifaa Vya Umeme',
                'tag_key'       => 'VVA',
                'tag_desc'      => 'Vifaa vya umeme wa majumbani na viwandani',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
