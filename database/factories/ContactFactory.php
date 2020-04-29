<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'contact_id' => '1',
        'contact_name' => $faker->name,
        'phone_1' => '9'.str_pad($faker->randomNumber(8),8,0,STR_PAD_RIGHT),
        'phone_2' => '9'.str_pad($faker->randomNumber(8),8,0,STR_PAD_RIGHT),
        'whatsapp' => '9'.str_pad($faker->randomNumber(8),8,0,STR_PAD_RIGHT),
    ];
});

