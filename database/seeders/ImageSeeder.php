<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image_name' => 'cv_classic1_anh1.jpg',
            'product_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic1_anh2.jpg',
            'product_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic2_anh1.jpg',
            'product_id' => 2
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic2_anh2.jpg',
            'product_id' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic3_anh1.jpg',
            'product_id' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic3_anh2.jpg',
            'product_id' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic4_anh1.jpg',
            'product_id' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic4_anh2.jpg',
            'product_id' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool1_anh1.jpg',
            'product_id' => 5,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool1_anh2.jpg',
            'product_id' => 5,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool2_anh1.jpg',
            'product_id' => 6,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool2_anh2.jpg',
            'product_id' => 6,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool3_anh1.jpg',
            'product_id' => 7
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool3_anh2.jpg',
            'product_id' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool4_anh1.jpg',
            'product_id' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool4_anh2.jpg',
            'product_id' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar1_anh1.jpg',
            'product_id' => 9,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar1_anh2.jpg',
            'product_id' => 9,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar2_anh1.jpg',
            'product_id' => 10,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar2_anh2.jpg',
            'product_id' => 10,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar3_anh1.jpg',
            'product_id' => 11,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar3_anh2.jpg',
            'product_id' => 11,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar4_anh1.jpg',
            'product_id' => 12,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar4_anh2.jpg',
            'product_id' => 12,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced1_anh1.jpg',
            'product_id' => 13,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced1_anh2.jpg',
            'product_id' => 13,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced2_anh1.jpg',
            'product_id' => 14,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced2_anh2.jpg',
            'product_id' => 14,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced3_anh1.jpg',
            'product_id' => 15,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced3_anh2.jpg',
            'product_id' => 15,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced4_anh1.jpg',
            'product_id' => 16,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced4_anh2.jpg',
            'product_id' => 16,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
