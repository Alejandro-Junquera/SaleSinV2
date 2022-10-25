<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Applieds;
use Faker\Generator as Faker;

$factory->define(Applieds::class, function (Faker $faker) {
    return [
        'offer_id' => \App\Offers::all()->random()->id,
        'user_id' => \App\User::all()->random()->id
    ];
});
