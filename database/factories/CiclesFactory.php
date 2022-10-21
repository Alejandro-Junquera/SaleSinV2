<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cicles;
use Faker\Generator as Faker;

$factory->define(cicles::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph,
        'img' => $faker->paragraph,
    ];
});
