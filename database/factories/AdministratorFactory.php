<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Administrator;
use Faker\Generator as Faker;

$factory->define(Administrator::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'biography' => $faker->paragraph,
        'youtube_channel' => $faker->url,
        'user_id'=> null,
    ];
});
