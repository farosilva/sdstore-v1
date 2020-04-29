<?php

use Illuminate\Database\Seeder;
use App\Models\DeliveryCity;

class DeliveryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = [
            ['ibge_id' => '3550308', 'city_name' => 'Sao Paulo', 'uf' => 'SP'],
            ['ibge_id' => '3503901', 'city_name' => 'Aruja',  'uf' => 'SP'],
            ['ibge_id' => '3505708', 'city_name' => 'Barueri',  'uf' => 'SP'],
            ['ibge_id' => '3509007', 'city_name' => 'Caieiras',  'uf' => 'SP'],
            ['ibge_id' => '3509205', 'city_name' => 'Cajamar',  'uf' => 'SP'],
            ['ibge_id' => '3510609', 'city_name' => 'Carapicuiba',  'uf' => 'SP'],
            ['ibge_id' => '3513009', 'city_name' => 'Cotia',  'uf' => 'SP'],
            ['ibge_id' => '3513801', 'city_name' => 'Diadema',  'uf' => 'SP'],
            ['ibge_id' => '3515004', 'city_name' => 'Embu das Artes',  'uf' => 'SP'],
            ['ibge_id' => '3515103', 'city_name' => 'Embu-Guacu',  'uf' => 'SP'],
            ['ibge_id' => '3515707', 'city_name' => 'Ferraz de Vasconcelo',  'uf' => 'SP'],
            ['ibge_id' => '3516408', 'city_name' => 'Franco daRocha',  'uf' => 'SP'],
            ['ibge_id' => '3518305', 'city_name' => 'Guararema',  'uf' => 'SP'],
            ['ibge_id' => '3518800', 'city_name' => 'Guarulhos',  'uf' => 'SP'],
            ['ibge_id' => '3522208', 'city_name' => 'Itapecerica da Serra',  'uf' => 'SP'],
            ['ibge_id' => '3522505', 'city_name' => 'Itapevi',  'uf' => 'SP'],
            ['ibge_id' => '3523107', 'city_name' => 'Itaquaquecetuba',  'uf' => 'SP'],
            ['ibge_id' => '3525003', 'city_name' => 'Jandira',  'uf' => 'SP'],
            ['ibge_id' => '3526209', 'city_name' => 'Juquitiba',  'uf' => 'SP'],
            ['ibge_id' => '3528502', 'city_name' => 'Mairipora',  'uf' => 'SP'],
            ['ibge_id' => '3529401', 'city_name' => 'Maua',  'uf' => 'SP'],
            ['ibge_id' => '3530607', 'city_name' => 'Mogi das Cruzes',  'uf' => 'SP'],
            ['ibge_id' => '3534401', 'city_name' => 'Osasco',  'uf' => 'SP'],
            ['ibge_id' => '3539806', 'city_name' => 'Poa',  'uf' => 'SP'],
            ['ibge_id' => '3543303', 'city_name' => 'Ribeirao Pires',  'uf' => 'SP'],
            ['ibge_id' => '3544103', 'city_name' => 'Rio Grande da Serra',  'uf' => 'SP'],
            ['ibge_id' => '3545001', 'city_name' => 'Salesopolis',  'uf' => 'SP'],
            ['ibge_id' => '3546801', 'city_name' => 'Santa Isabel',  'uf' => 'SP'],
            ['ibge_id' => '3547304', 'city_name' => 'Santana de Parnaiba',  'uf' => 'SP'],
            ['ibge_id' => '3547809', 'city_name' => 'Santo Andre',  'uf' => 'SP'],
            ['ibge_id' => '3548708', 'city_name' => 'Sao Bernardo do Campo',  'uf' => 'SP'],
            ['ibge_id' => '3548807', 'city_name' => 'Sao Caetano do Sul',  'uf' => 'SP'],
            ['ibge_id' => '3549953', 'city_name' => 'Sao Lourenco da Serra',  'uf' => 'SP'],
            ['ibge_id' => '3552502', 'city_name' => 'Suzano',  'uf' => 'SP'],
            ['ibge_id' => '3552809', 'city_name' => 'Taboao da Serra',  'uf' => 'SP'],
            ['ibge_id' => '3556453', 'city_name' => 'Vargem Grande Paulista',  'uf' => 'SP'],
        ];

        foreach($lines as $line){
            DeliveryCity::create($line);
        }
    }
}
