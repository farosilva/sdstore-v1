<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $first_name = $faker->unique()->firstNameMale;
    $last_name = $faker->unique()->lastName;
    return [
        'full_name' => $first_name.' '.$faker->lastName.' '.$last_name,
        'short_name' => $first_name.' '.$last_name,
        'email' => mb_strtolower($first_name.'.'.$last_name.'@exemple.com'),
        'type' => 'F',
        'cpf_cnpj' => preg_replace('/\D/', '', $faker->unique()->cpf),
        'password' => Hash::make('password')
    ];
});
