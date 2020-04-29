<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $lines = [
            ['subcategory_id' => '1', 'category_id' => '1', 'name' => 'Salgados'],
            ['subcategory_id' => '2', 'category_id' => '1', 'name' => 'Massas Recheadas Pré-cozidas'],
            ['subcategory_id' => '3', 'category_id' => '1', 'name' => 'Sopas'],
            ['subcategory_id' => '4', 'category_id' => '2', 'name' => 'Pizzas Brotinho'],
            ['subcategory_id' => '5', 'category_id' => '2', 'name' => 'Massas Frescas'],
            ['subcategory_id' => '6', 'category_id' => '2', 'name' => 'Massas Pré-cozidas'],
            ['subcategory_id' => '7', 'category_id' => '2', 'name' => 'Massas Recheadas Pré-cozidas'],
            ['subcategory_id' => '8', 'category_id' => '3', 'name' => 'Salgados'],
            ['subcategory_id' => '9', 'category_id' => '3', 'name' => 'Massas Frescas'],
            ['subcategory_id' => '10', 'category_id' => '3', 'name' => 'Massas Pré-cozidas'],
            ['subcategory_id' => '11', 'category_id' => '3', 'name' => 'Massas Recheadas Pré-cozidas'],
            ['subcategory_id' => '12', 'category_id' => '3', 'name' => 'Sopas'],
            ['subcategory_id' => '13', 'category_id' => '3', 'name' => 'Molhos'],
            ['subcategory_id' => '14', 'category_id' => '1', 'name' => 'Pratos Feitos'],
            ['subcategory_id' => '15', 'category_id' => '4', 'name' => 'Integrais'],
        ];

        foreach($lines as $line){
            Subcategory::create($line);
        }
    }
}
