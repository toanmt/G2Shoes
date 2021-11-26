<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'author' => 'LVL',
            'content' => 'Sản phẩm tốt.',
            'rating' => '3',
            'product_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('comments')->insert([
            'author' => 'New',
            'content' => 'Sản phẩm tệ.',
            'rating' => '1',
            'product_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('comments')->insert([
            'author' => 'LL',
            'content' => 'Sản phẩm tốt.',
            'rating' => '5',
            'product_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
