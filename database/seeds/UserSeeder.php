<?php

use App\Models\User;
use App\Models\UserNatural;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create()
        ->each(function($user){
            $user->infos_natural()->save(factory(UserNatural::class)->make());
            // $user->contacts()->save(factory(Contact::class)->make());
        });
    }
}
