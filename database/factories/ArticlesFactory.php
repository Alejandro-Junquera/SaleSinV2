<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\articles;
use Faker\Generator as Faker;

$factory->define(articles::class, function (Faker $faker) {
    return [
        'title'=> $faker->paragraph,
        'image'=> $faker->paragraph,
        'description'=> $faker->paragraph,
        'cicles_id'=> \App\cicles::all()->random()->id
    ];
});
