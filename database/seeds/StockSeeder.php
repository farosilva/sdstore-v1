<?php

use Illuminate\Database\Seeder;
use App\Models\Stock;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $lines = [
            ['sku' => 'STOD124',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2410',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD1651',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD1678',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2925',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD1927',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2933',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2623',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2771',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD2763',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD140',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            ['sku' => 'STOD167',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD159',   'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2747',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2379',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD3009',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2739',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2712',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2968',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2631',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2976',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2798',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2801',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD19',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2445',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2682',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD86',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2437',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD1317',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD1643',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD3085',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2895',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2860',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2649',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2658',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD3093',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD43',    'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD2429',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD9999',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD9998',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
            [ 'sku' => 'STOD9997',  'quantity' => '20'], //$faker->numberBetween(15, 30)],
        ];

        foreach($lines as $line){
            Stock::create($line);
        }
    }
}
