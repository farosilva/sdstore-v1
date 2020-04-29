<?php

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackagesSeeder extends Seeder
{
    public function run()
    {
        $lines = [
            ['pack_id' => '1', 'prefix' => 'bd',     'name' => 'Bandeja de Isopor',  'name_alt' => 'Bandeja',    'weight' => '0'],
            ['pack_id' => '2', 'prefix' => 'pct',    'name' => 'Pacote',             'name_alt' => 'Pacote',     'weight' => '0'],
            ['pack_id' => '3', 'prefix' => 'pt',     'name' => 'Pote',               'name_alt' => 'Pote',       'weight' => '0'],
            ['pack_id' => '4', 'prefix' => 'dc',     'name' => 'Disco de Isopor',    'name_alt' => 'Disco',      'weight' => '0'],
            ['pack_id' => '5', 'prefix' => 'sch',    'name' => 'Sachê',              'name_alt' => 'Sachê',      'weight' => '0'],
        ];

        foreach($lines as $line){
            Package::create($line);
        }
    }
}
