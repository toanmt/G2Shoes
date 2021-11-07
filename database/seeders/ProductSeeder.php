<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Converse X CDG Low Black',
            'price' => '990000',
            'discount' => '5',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Converse X CDG Low White',
            'price' => '900000',
            'discount' => '0',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Converse 1970S Low Sunflower',
            'price' => '780000',
            'discount' => '5',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Converse High Black Fire',
            'price' => '980000',
            'discount' => '4',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Pig Suede',
            'price' => '976000',
            'discount' => '4',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Gremlins',
            'price' => '800000',
            'discount' => '5',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Mixed Corduroy',
            'price' => '900000',
            'discount' => '5',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Eco Theory',
            'price' => '800000',
            'discount' => '10',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Adidas Exhibit Low',
            'price' => '760000',
            'discount' => '6',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Adidas Stan Smith Green',
            'price' => '940000',
            'discount' => '10',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Adidas 4D Fusio',
            'price' => '780000',
            'discount' => '10',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Adidas SuperEarth SW',
            'price' => '900000',
            'discount' => '5',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 Colorful',
            'price' => '980000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Airmax Axis Triplewhite',
            'price' => '790000',
            'discount' => '3',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Airmax 97 WMN The Future',
            'price' => '900000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Jordan Mid Turf Orange',
            'price' => '999000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Puma Suede Classic Peacoat-White',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Puma Suede Black Fives Phantom',
            'price' => '980000',
            'discount' => '0',
            'type_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Domba Highpoint 2 Gold Metallic',
            'price' => '990000',
            'discount' => '20',
            'type_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Domba Highpoint 2 Silver Metallic',
            'price' => '999000',
            'discount' => '20',
            'type_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
