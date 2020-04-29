<?php

use Illuminate\Database\Seeder;
use App\Models\ProductPrice;
use App\Models\ProductVariant;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $lines = [
            ['sku' => 'STOD124', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '34.35'],
            ['sku' => 'STOD1317', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '14.04'],
            ['sku' => 'STOD140', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.53'],
            ['sku' => 'STOD159', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.53'],
            ['sku' => 'STOD1643', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '14.04'],
            ['sku' => 'STOD1651', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '14.04'],
            ['sku' => 'STOD167', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.53'],
            ['sku' => 'STOD1678', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '14.04'],
            ['sku' => 'STOD19', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '34.35'],
            ['sku' => 'STOD1927', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '51.38'],
            ['sku' => 'STOD2379', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '39.03'],
            ['sku' => 'STOD2410', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD2429', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD2437', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD2445', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD2623', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '75.00'],
            ['sku' => 'STOD2631', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '89.00'],
            ['sku' => 'STOD2649', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '27.30'],
            ['sku' => 'STOD2658', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '27.30'],
            ['sku' => 'STOD2682', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD2712', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '27.30'],
            ['sku' => 'STOD2739', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '39.03'],
            ['sku' => 'STOD2747', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '39.03'],
            ['sku' => 'STOD2763', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '75.00'],
            ['sku' => 'STOD2771', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '75.00'],
            ['sku' => 'STOD2798', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '89.00'],
            ['sku' => 'STOD2801', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '89.00'],
            ['sku' => 'STOD2860', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '39.03'],
            ['sku' => 'STOD2895', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '39.03'],
            ['sku' => 'STOD2925', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '20.55'],
            ['sku' => 'STOD2933', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '20.55'],
            ['sku' => 'STOD2968', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.80'],
            ['sku' => 'STOD2976', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.80'],
            ['sku' => 'STOD3009', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '24.96'],
            ['sku' => 'STOD3085', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.16'],
            ['sku' => 'STOD3093', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '17.95'],
            ['sku' => 'STOD43', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '34.35'],
            ['sku' => 'STOD86', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '34.35'],
            ['sku' => 'STOD9999', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.90'],
            ['sku' => 'STOD9998', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.90'],
            ['sku' => 'STOD9997', 'table_id' => '1', 'start_date' => now()->format('Y-m-d'), 'price' => '26.90'],
        ];

        foreach($lines as $line){
            $product = ProductPrice::create($line);
        }
    }
}
