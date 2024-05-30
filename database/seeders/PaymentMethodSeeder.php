<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('accounts')->insert([
            [
                'account_type'      => 'NMB Bank',
                'account_name'      => 'Ryana Tumaini Ryana',
                'account_number'    => '302890189289291',
                'account_balance'   => '0',
                'account_status'    => 'available',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
