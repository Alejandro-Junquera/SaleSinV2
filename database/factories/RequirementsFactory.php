<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requirements;
use Faker\Generator as Faker;

$factory->define(Requirements::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'offer_id' => \App\offers::all()->random()->id
    ];
});
