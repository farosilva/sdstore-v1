<?php

use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class ProductAttributeSeeder extends Seeder
{
    public function run()
    {
        $lines = [
            ['sku' => 'STOD19', 'pack_id' => '1', 'qtde_pack' => '28', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD43', 'pack_id' => '1', 'qtde_pack' => '25', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD86', 'pack_id' => '1', 'qtde_pack' => '9', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD124', 'pack_id' => '1', 'qtde_pack' => '25', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD140', 'pack_id' => '1', 'qtde_pack' => '12', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD159', 'pack_id' => '4', 'qtde_pack' => '5', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD167', 'pack_id' => '4', 'qtde_pack' => '12', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD1317', 'pack_id' => '3', 'qtde_pack' => '0', 'weight' => '300', 'unit' => 'ml', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD1643', 'pack_id' => '3', 'qtde_pack' => '0', 'weight' => '300', 'unit' => 'ml', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD1651', 'pack_id' => '3', 'qtde_pack' => '0', 'weight' => '300', 'unit' => 'ml', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD1678', 'pack_id' => '3', 'qtde_pack' => '0', 'weight' => '300', 'unit' => 'ml', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD1927', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '600', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD2379', 'pack_id' => '4', 'qtde_pack' => '10', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2410', 'pack_id' => '1', 'qtde_pack' => '13', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2429', 'pack_id' => '1', 'qtde_pack' => '13', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2437', 'pack_id' => '1', 'qtde_pack' => '4', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2445', 'pack_id' => '1', 'qtde_pack' => '14', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2623', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '600', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2631', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '1200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD2649', 'pack_id' => '1', 'qtde_pack' => '15', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2658', 'pack_id' => '1', 'qtde_pack' => '15', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2682', 'pack_id' => '1', 'qtde_pack' => '14', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2712', 'pack_id' => '1', 'qtde_pack' => '50', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2739', 'pack_id' => '1', 'qtde_pack' => '100', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2747', 'pack_id' => '1', 'qtde_pack' => '12', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2763', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '600', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2771', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '600', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD2798', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '1200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2801', 'pack_id' => '2', 'qtde_pack' => '10', 'weight' => '1200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2860', 'pack_id' => '1', 'qtde_pack' => '30', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD2895', 'pack_id' => '1', 'qtde_pack' => '0', 'weight' => '400', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2925', 'pack_id' => '1', 'qtde_pack' => '4', 'weight' => '240', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2933', 'pack_id' => '1', 'qtde_pack' => '4', 'weight' => '240', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD2968', 'pack_id' => '1', 'qtde_pack' => '2', 'weight' => '240', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD2976', 'pack_id' => '1', 'qtde_pack' => '2', 'weight' => '240', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD3009', 'pack_id' => '5', 'qtde_pack' => '0', 'weight' => '500', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD3085', 'pack_id' => '3', 'qtde_pack' => '0', 'weight' => '300', 'unit' => 'ml', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD3093', 'pack_id' => '1', 'qtde_pack' => '15', 'weight' => '200', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '1'],
            ['sku' => 'STOD9999', 'pack_id' => '1', 'qtde_pack' => '0', 'weight' => '450', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD9998', 'pack_id' => '1', 'qtde_pack' => '0', 'weight' => '450', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
            ['sku' => 'STOD9997', 'pack_id' => '1', 'qtde_pack' => '0', 'weight' => '450', 'unit' => 'g', 'minimal_stock' => '10', 'featured' => '0'],
        ];

        foreach($lines as $line){
            ProductAttribute::create($line);
        }
    }
}
