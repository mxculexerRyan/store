<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Service_providerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_providers')->insert([
            [
                'provider_name' => 'Simba Logistics',
                'provider_email' => 'simba@logistics.com',
                'provider_phone' => '(+163) 561-574-783',
                'provider_location' => 'Buzuruga - Mwanza',
                'provider_bank' => 'CRDB',
                'provider_account' => '1234-5678-9009-8735',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
