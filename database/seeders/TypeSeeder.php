<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //type_id:1
        DB::table('types')->insert([
            'type_name' => 'Converse CLASSIC',
            'brand_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:2
        DB::table('types')->insert([
            'type_name' => 'Vans OLD SKOOL',
            'brand_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:3
        DB::table('types')->insert([
            'type_name' => 'Adidas SUPERSTAR',
            'brand_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:4
        DB::table('types')->insert([
            'type_name' => 'Nike AIR FORCE',
            'brand_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:5
        DB::table('types')->insert([
            'type_name' => 'Puma SUEDE',
            'brand_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:6
        DB::table('types')->insert([
            'type_name' => 'Domba HIGHPOINT',
            'brand_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:7
        DB::table('types')->insert([
            'type_name' => 'Converse CHUCK 70S',
            'brand_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:8
        DB::table('types')->insert([
            'type_name' => 'Vans AUTHENTIC',
            'brand_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:9
        DB::table('types')->insert([
            'type_name' => 'Adidas ULTRABOOST',
            'brand_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //type_id:10
        DB::table('types')->insert([
            'type_name' => 'Nike BLAZER',
            'brand_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
