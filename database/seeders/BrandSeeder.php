<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //brand_id:1
        DB::table('brands')->insert([
            'brand_name' => 'Converse',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //brand_id:2
        DB::table('brands')->insert([
            'brand_name' => 'Vans',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //brand_id:3
        DB::table('brands')->insert([
            'brand_name' => 'Adidas',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //brand_id:4
        DB::table('brands')-> insert([
            'brand_name' => 'Nike',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //brand_id:5
        DB::table('brands') -> insert([
            'brand_name' => 'Puma',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //brand_id:6
        DB::table('brands') -> insert([
            'brand_name' => 'Domba',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
