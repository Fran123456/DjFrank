<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
	$name = $faker->sentence;
    return [
    	    'name'=> $name,
    	    'orderInt' => null,
            'description'=> $faker->paragraph,
            'slug' => str::Slug($name, '-'),
            'course_id'=>null
    ];
});
