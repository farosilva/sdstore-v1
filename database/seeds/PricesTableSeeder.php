<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\PriceTable;

class PricesTableSeeder extends Seeder
{
    public function run()
    {
        $lines = [
            ['name' => 'Santo Dom Ecommerce']
        ];

        foreach ($lines as $line){
            PriceTable::create($line);
        }
    }
}
