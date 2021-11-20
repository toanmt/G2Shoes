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
        //product_id:1
        DB::table('products')->insert([
            'product_name' => 'Converse Classic Low White',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:2
        DB::table('products')->insert([
            'product_name' => 'Converse Classic High Black',
            'price' => '850000',
            'discount' => '0',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:3
        DB::table('products')->insert([
            'product_name' => 'Converse Classic Custom Glitter',
            'price' => '820000',
            'discount' => '5',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:4
        DB::table('products')->insert([
            'product_name' => 'Converse Classic Custom All Star',
            'price' => '900000',
            'discount' => '4',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:5
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Pig Suede',
            'price' => '976000',
            'discount' => '4',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:6
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Gremlins',
            'price' => '800000',
            'discount' => '5',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:7
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Mixed Corduroy',
            'price' => '900000',
            'discount' => '5',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:8
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Eco Theory',
            'price' => '800000',
            'discount' => '10',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:9
        DB::table('products')->insert([
            'product_name' => 'Adidas Exhibit Low',
            'price' => '760000',
            'discount' => '6',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:10
        DB::table('products')->insert([
            'product_name' => 'Adidas Stan Smith Green',
            'price' => '940000',
            'discount' => '10',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:11
        DB::table('products')->insert([
            'product_name' => 'Adidas 4D Fusio',
            'price' => '780000',
            'discount' => '10',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:12
        DB::table('products')->insert([
            'product_name' => 'Adidas SuperEarth SW',
            'price' => '900000',
            'discount' => '5',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:13
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 Colorful',
            'price' => '980000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:14
        DB::table('products')->insert([
            'product_name' => 'Nike Airmax Axis Triplewhite',
            'price' => '790000',
            'discount' => '3',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:15
        DB::table('products')->insert([
            'product_name' => 'Nike Airmax 97 WMN The Future',
            'price' => '900000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:16
        DB::table('products')->insert([
            'product_name' => 'Nike Jordan Mid Turf Orange',
            'price' => '999000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:17
        DB::table('products')->insert([
            'product_name' => 'Puma Suede Classic Peacoat-White',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:18
        DB::table('products')->insert([
            'product_name' => 'Puma Suede Black Fives Phantom',
            'price' => '980000',
            'discount' => '0',
            'type_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:19
        DB::table('products')->insert([
            'product_name' => 'Domba Highpoint 2 Gold Metallic',
            'price' => '990000',
            'discount' => '20',
            'type_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:20
        DB::table('products')->insert([
            'product_name' => 'Domba Highpoint 2 Silver Metallic',
            'price' => '999000',
            'discount' => '20',
            'type_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:21
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool The Exorcist',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:22
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Cozy Mule',
            'price' => '700000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:23
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Loteria',
            'price' => '900000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:24
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Beetlejuice',
            'price' => '800000',
            'discount' => '5',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:25
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Moca Frances',
            'price' => '650000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:26
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Fangs',
            'price' => '750000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:27
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Anaheim Factory',
            'price' => '980000',
            'discount' => '3',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:28
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Classic Sport',
            'price' => '800000',
            'discount' => '2',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:29
        DB::table('products')->insert([
            'product_name' => 'Vans Old Skool Canvas',
            'price' => '990000',
            'discount' => '0',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:30
        DB::table('products')->insert([
            'product_name' => 'Vans Authentic Classic',
            'price' => '600000',
            'discount' => '2',
            'type_id' => '8',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:31
        DB::table('products')->insert([
            'product_name' => 'Vans Authentic Beetlejuice',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '8',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:32
        DB::table('products')->insert([
            'product_name' => 'Vans Authentic Gumsole',
            'price' => '500000',
            'discount' => '0',
            'type_id' => '8',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:33
        DB::table('products')->insert([
            'product_name' => 'Converse Classic Oregon Ducks',
            'price' => '900000',
            'discount' => '2',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:34
        DB::table('products')->insert([
            'product_name' => 'Converse Chuck 70S Court Reimagined',
            'price' => '900000',
            'discount' => '7',
            'type_id' => '7',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:35
        DB::table('products')->insert([
            'product_name' => 'Converse Chuck 70S Boston Celtics',
            'price' => '800000',
            'discount' => '3',
            'type_id' => '7',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:36
        DB::table('products')->insert([
            'product_name' => 'Converse Chuck 70S Los Angeles',
            'price' => '900000',
            'discount' => '0',
            'type_id' => '7',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:37
        DB::table('products')->insert([
            'product_name' => 'Adidas Superstar Slip-On',
            'price' => '750000',
            'discount' => '3',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:38
        DB::table('products')->insert([
            'product_name' => 'Adidas Superstar Simpsons Squishee',
            'price' => '800000',
            'discount' => '0',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:39
        DB::table('products')->insert([
            'product_name' => 'Adidas Superstar X LEGO®',
            'price' => '900000',
            'discount' => '5',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:40
        DB::table('products')->insert([
            'product_name' => 'Adidas Ultraboost 21',
            'price' => '700000',
            'discount' => '3',
            'type_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:41
        DB::table('products')->insert([
            'product_name' => 'Adidas Ultraboost 21 Tokyo',
            'price' => '750000',
            'discount' => '3',
            'type_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:42
        DB::table('products')->insert([
            'product_name' => 'Adidas Ultraboost Response',
            'price' => '780000',
            'discount' => '0',
            'type_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:43
        DB::table('products')->insert([
            'product_name' => 'Adidas Ultraboost Parley',
            'price' => '700000',
            'discount' => '2',
            'type_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:44
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 White Love For All',
            'price' => '800000',
            'discount' => '3',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:45
        DB::table('products')->insert([
            'product_name' => 'Nike Air Max 97 Pink Cream',
            'price' => '690000',
            'discount' => '0',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:46
        DB::table('products')->insert([
            'product_name' => 'Nike Blazer Low 77 Premium',
            'price' => '800000',
            'discount' => '6',
            'type_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:47
        DB::table('products')->insert([
            'product_name' => 'Nike Blazer Mid 77 Cozi',
            'price' => '720000',
            'discount' => '0',
            'type_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:48
        DB::table('products')->insert([
            'product_name' => 'Nike Blazer Mid 77 Vintage',
            'price' => '734000',
            'discount' => '3',
            'type_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:49
        DB::table('products')->insert([
            'product_name' => 'Nike Blazer Low Pro GT',
            'price' => '800000',
            'discount' => '5',
            'type_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        //product_id:50
        DB::table('products')->insert([
            'product_name' => 'Nike Blazer SB Zoom Premium',
            'price' => '960000',
            'discount' => '10',
            'type_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
