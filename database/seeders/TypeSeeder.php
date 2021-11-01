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
        DB::table('types') -> insert([
            'type_name' => 'Converse CLASSIC',
            'brand_id' => '1'
        ]);
        DB::table('types') -> insert([
            'type_name' => 'Vans OLD SKOOL',
            'brand_id' => '2'
        ]);
        DB::table('types') -> insert([
            'type_name' => 'Adidas SUPERSTAR',
            'brand_id' => '3'
        ]);
        DB::table('types') -> insert([
            'type_name' => 'Nike AIR FORCE',
            'brand_id' => '4'
        ]);
    }
}
