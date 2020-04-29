<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserAdminSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            PackagesSeeder::class,
            PricesTableSeeder::class,
            DeliveryCitySeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            ProductAttributeSeeder::class,
            ProductImageSeeder::class,
            ProductPriceSeeder::class,
            StockSeeder::class,
        ]);
    }
}
