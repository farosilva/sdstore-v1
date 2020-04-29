<?php

use App\Models\UserAdmin;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    public function run()
    {
        $lines = [
            [
                'full_name' => 'Fabricio Rodrigo Silva',
                'short_name' => 'Fabricio Silva',
                'email' => 'fabricio.santos@santodomalimentos.com.br',
                'password' => bcrypt('password'),
                'status' => 'A'
            ]
        ];

        foreach($lines as $line){
            UserAdmin::create($line);
        }
    }
}
