<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\offers;
use Faker\Generator as Faker;

$factory->define(offers::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'date' => $faker -> dateTimeBetween('now', '07 days'),
        'num_candidates' => $faker->randomDigitNotNull,
        'cicle_id' => \App\cicles::all()->random->id
    ];
});
