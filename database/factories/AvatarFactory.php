<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
    	'nombre' => $faker->word,
        'avatar' => Image::image(storage_path().'/app/public/users', 200, 200, 'people', false),
    ];
});
