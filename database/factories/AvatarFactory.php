<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Avatar;
use Faker\Generator as Faker;
use Faker\Provider\Image;

$factory->define(Avatar::class, function (Faker $faker) {
    return [
    	'nombre' => $faker->word,
        'avatar' => Image::image(storage_path().'/app/public/users', 200, 200, 'people', false),
    ];
});
