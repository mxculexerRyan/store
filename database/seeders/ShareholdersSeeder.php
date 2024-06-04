<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ShareholdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('shareholders')->insert([
            // roles 1-3 are added via users because they can directly access the system
            [
                'name' => 'Tumaini Ryana',
                'email' => 'ceo@kanza.com',
                'phone' => '(+255) 228-096-234',
                'location' => 'Musoma - Mara',
                'payement_method' => 'NBC Bank',
                'account_number' => '4567-9545-9856-9876',
                'role' => '4',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Paul Tata',
                'email' => 'ceo@kanza.com',
                'phone' => '(+255) 228-096-234',
                'location' => 'Musoma - Mara',
                'payement_method' => 'NBC Bank',
                'account_number' => '4567-9545-9856-9876',
                'role' => '5',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Hussein Africable',
                'email' => 'ceo@kanza.com',
                'phone' => '(+255) 228-096-234',
                'location' => 'Musoma - Mara',
                'payement_method' => 'NBC Bank',
                'account_number' => '4567-9545-9856-9876',
                'role' => '6',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Robert James',
                'email' => 'ceo@kanza.com',
                'phone' => '(+255) 228-096-234',
                'location' => 'Musoma - Mara',
                'payement_method' => 'NBC Bank',
                'account_number' => '4567-9545-9856-9876',
                'role' => '7',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'TRA Mwanza',
                'email' => 'ceo@kanza.com',
                'phone' => '(+255) 228-096-234',
                'location' => 'Musoma - Mara',
                'payement_method' => 'NBC Bank',
                'account_number' => '4567-9545-9856-9876',
                'role' => '8',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
