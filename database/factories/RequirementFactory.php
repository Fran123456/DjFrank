<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Requirement;
use Faker\Generator as Faker;
use App\Course;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
       // 'course_id'=> Course::all()->random()->id,
    	'course_id'=> null,
        'requirement'=> $faker->sentence,
    ];
});
