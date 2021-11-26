<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(VoucherSeeder::class);
        $this->call(Product_SizeSeeder::class);
        $this->call(ImageSeeder::class);
    }
}
