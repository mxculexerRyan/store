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
                'tag_name'      => 'Main Switches',
                'tag_key'       => 'MSC',
                'tag_desc'      => 'Distribution board & M/Switvhes',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Circuit Breakers',
                'tag_key'       => 'CBR',
                'tag_desc'      => 'Residual Current Circuit Breaker',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Conduit Pipes',
                'tag_key'       => 'CPP',
                'tag_desc'      => 'Bomba nzito na nyepesi',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Trunkings',
                'tag_key'       => 'TRK',
                'tag_desc'      => 'Trunking za gundi na kawaida',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Single Core',
                'tag_key'       => 'SCR',
                'tag_desc'      => 'Earth wires / single core',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Twin Wires',
                'tag_key'       => 'TWN',
                'tag_desc'      => 'Two in one wires / Twin wire',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Flexible Wires',
                'tag_key'       => 'FXB',
                'tag_desc'      => 'Flexible wire / Solar wire',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Switches',
                'tag_key'       => 'SWC',
                'tag_desc'      => 'Socket & lamp switches',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Holders',
                'tag_key'       => 'HLD',
                'tag_desc'      => 'Lamp holders & ceiling roses',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Bulbs',
                'tag_key'       => 'BLB',
                'tag_desc'      => 'LED & Filament lamps',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Tube Light',
                'tag_key'       => 'TBL',
                'tag_desc'      => 'Tubes & Fittings',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Panel Lights',
                'tag_key'       => 'PNL',
                'tag_desc'      => 'Suraface & In',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'PVC Accesories',
                'tag_key'       => 'PVA',
                'tag_desc'      => 'Conduit & wire connectors',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Extensions',
                'tag_key'       => 'EXT',
                'tag_desc'      => 'Extensions & plugs',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Earth Roads',
                'tag_key'       => 'ETR',
                'tag_desc'      => 'Earthrod wire & copper',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Fans',
                'tag_key'       => 'FAN',
                'tag_desc'      => 'Ceiling Fan & Table Fan',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'tag_name'      => 'Un-classified',
                'tag_key'       => 'UNC',
                'tag_desc'      => 'Un-classified Items',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
