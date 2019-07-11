<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Goal;
use Faker\Generator as Faker;
use App\Course;

$factory->define(Goal::class, function (Faker $faker) {
    return [
    	'course_id'=> Course::all()->random()->id,
        'goal'=> $faker->sentence,
    ];
});
