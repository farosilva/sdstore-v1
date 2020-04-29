<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $lines = [
            ['name' => 'Sem Glúten', 'status' => 'A'],
            ['name' => 'Vegetariana e Sem Glúten', 'status' => 'A'],
            ['name' => 'Vegana e Sem Glúten', 'status' => 'A'],
            ['name' => 'Com Glúten', 'status' => 'A'],
        ];

        foreach($lines as $line){
            Category::create($line);
        }
    }
}
