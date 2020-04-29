<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserNatural;
use Faker\Generator as Faker;

$factory->define(UserNatural::class, function (Faker $faker) {
    return [
        'birth_date' => $faker->dateTimeBetween('-30 years', '-20 years'),
        'genre' => 'M'
    ];
});
