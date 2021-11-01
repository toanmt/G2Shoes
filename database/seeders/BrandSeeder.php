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
        DB::table('brands') -> insert([
            'brand_name' => 'Converse',
        ]);
        DB::table('brands') -> insert([
            'brand_name' => 'Vans'
        ]);
        DB::table('brands') -> insert([
            'brand_name' => 'Adidas'
        ]);
        DB::table('brands') -> insert([
            'brand_name' => 'Nike'
        ]);
        DB::table('brands') -> insert([
            'brand_name' => 'Jordan'
        ]);
        DB::table('brands') -> insert([
            'brand_name' => 'Puma'
        ]);
    }
}
