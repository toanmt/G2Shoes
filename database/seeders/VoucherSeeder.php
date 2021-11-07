<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            'voucher_name' => 'SALE10',
            'percent' => '10',
            'amount' => '500',
            'expired_date' => '2022-11-11 12:00:00',
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('vouchers')->insert([
            'voucher_name' => 'SALE20',
            'percent' => '20',
            'amount' => '400',
            'expired_date' => '2022-11-11 12:00:00',
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('vouchers')->insert([
            'voucher_name' => 'SALE30',
            'percent' => '30',
            'amount' => '300',
            'expired_date' => '2022-11-11 12:00:00',
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('vouchers')->insert([
            'voucher_name' => 'SALE40',
            'percent' => '40',
            'amount' => '200',
            'expired_date' => '2022-11-11 12:00:00',
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('vouchers')->insert([
            'voucher_name' => 'SALE50',
            'percent' => '50',
            'amount' => '100',
            'expired_date' => '2022-11-11 12:00:00',
            'status' => '0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
