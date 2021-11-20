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
            'image_name' => 'cv_classic1_anh1.webp',
            'product_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic1_anh2.webp',
            'product_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic2_anh1.webp',
            'product_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic2_anh2.webp',
            'product_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic3_anh1.webp',
            'product_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic3_anh2.webp',
            'product_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic4_anh1.webp',
            'product_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic4_anh2.webp',
            'product_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool1_anh1.webp',
            'product_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool1_anh2.webp',
            'product_id' => '5',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool2_anh1.webp',
            'product_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool2_anh2.webp',
            'product_id' => '6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool3_anh1.webp',
            'product_id' => '7',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool3_anh2.webp',
            'product_id' => '7',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool4_anh1.webp',
            'product_id' => '8',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool4_anh2.webp',
            'product_id' => '8',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar1_anh1.webp',
            'product_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar1_anh2.webp',
            'product_id' => '9',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar2_anh1.webp',
            'product_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar2_anh2.webp',
            'product_id' => '10',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar3_anh1.webp',
            'product_id' => '11',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar3_anh2.webp',
            'product_id' => '11',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar4_anh1.webp',
            'product_id' => '12',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar4_anh2.webp',
            'product_id' => '12',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced1_anh1.webp',
            'product_id' => '13',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced1_anh2.webp',
            'product_id' => '13',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced2_anh1.webp',
            'product_id' => '14',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced2_anh2.webp',
            'product_id' => '14',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced3_anh1.webp',
            'product_id' => '15',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced3_anh2.webp',
            'product_id' => '15',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced4_anh1.webp',
            'product_id' => '16',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced4_anh2.webp',
            'product_id' => '16',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'puma_suede1_anh1.webp',
            'product_id' => '17',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'puma_suede1_anh2.webp',
            'product_id' => '17',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'puma_suede2_anh1.webp',
            'product_id' => '18',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'puma_suede2_anh2.webp',
            'product_id' => '18',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'domba_highpoint1_anh1.webp',
            'product_id' => '19',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'domba_highpoint1_anh2.webp',
            'product_id' => '19',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'domba_highpoint2_anh1.webp',
            'product_id' => '20',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'domba_highpoint2_anh2.webp',
            'product_id' => '20',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool5_anh1.webp',
            'product_id' => '21',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool5_anh2.webp',
            'product_id' => '21',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool6_anh1.webp',
            'product_id' => '22',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool6_anh2.webp',
            'product_id' => '22',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool7_anh1.webp',
            'product_id' => '23',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool7_anh2.webp',
            'product_id' => '23',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool8_anh1.webp',
            'product_id' => '24',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool8_anh2.webp',
            'product_id' => '24',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool9_anh1.webp',
            'product_id' => '25',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool9_anh2.webp',
            'product_id' => '25',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool10_anh1.webp',
            'product_id' => '26',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool10_anh2.webp',
            'product_id' => '26',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool11_anh1.webp',
            'product_id' => '27',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool11_anh2.webp',
            'product_id' => '27',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool12_anh1.webp',
            'product_id' => '28',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool12_anh2.webp',
            'product_id' => '28',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool13_anh1.webp',
            'product_id' => '29',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_oldskool13_anh2.webp',
            'product_id' => '29',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic1_anh1.webp',
            'product_id' => '30',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic1_anh2.webp',
            'product_id' => '30',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic2_anh1.webp',
            'product_id' => '31',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic2_anh2.webp',
            'product_id' => '31',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic3_anh1.webp',
            'product_id' => '32',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'vans_authentic3_anh2.webp',
            'product_id' => '32',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic5_anh1.webp',
            'product_id' => '33',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_classic5_anh2.webp',
            'product_id' => '33',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck1_anh1.webp',
            'product_id' => '34',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck1_anh2.webp',
            'product_id' => '34',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck2_anh1.webp',
            'product_id' => '35',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck2_anh2.webp',
            'product_id' => '35',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck3_anh1.webp',
            'product_id' => '36',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'cv_chuck3_anh2.webp',
            'product_id' => '36',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar5_anh1.webp',
            'product_id' => '37',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar5_anh2.webp',
            'product_id' => '37',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar6_anh1.webp',
            'product_id' => '38',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar6_anh2.webp',
            'product_id' => '38',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar7_anh1.webp',
            'product_id' => '39',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_superstar7_anh2.webp',
            'product_id' => '39',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost1_anh1.webp',
            'product_id' => '40',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost1_anh2.webp',
            'product_id' => '40',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost2_anh1.webp',
            'product_id' => '41',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost2_anh2.webp',
            'product_id' => '41',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost3_anh1.webp',
            'product_id' => '42',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost3_anh2.webp',
            'product_id' => '42',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost4_anh1.webp',
            'product_id' => '43',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'adidas_ultraboost4_anh2.webp',
            'product_id' => '43',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced5_anh1.webp',
            'product_id' => '44',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced5_anh2.webp',
            'product_id' => '44',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced6_anh1.webp',
            'product_id' => '45',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_airforced6_anh2.webp',
            'product_id' => '45',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer1_anh1.webp',
            'product_id' => '46',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer1_anh2.webp',
            'product_id' => '46',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer2_anh1.webp',
            'product_id' => '47',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer2_anh2.webp',
            'product_id' => '47',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer3_anh1.webp',
            'product_id' => '48',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer3_anh2.webp',
            'product_id' => '48',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer4_anh1.webp',
            'product_id' => '49',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer4_anh2.webp',
            'product_id' => '49',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer5_anh1.webp',
            'product_id' => '50',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('images')->insert([
            'image_name' => 'nike_blazer5_anh2.webp',
            'product_id' => '50',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
