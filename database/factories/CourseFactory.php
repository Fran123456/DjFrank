<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use App\Course;
use App\Administrator;
use App\Category;
use App\Level;
use Faker\Provider\Image;

$factory->define(Course::class, function (Faker $faker) {
	$name =$faker->sentence;
	$status = Couse::PUBLISHED;
    return [
      'admin_id' => Administrator::all()->random()->id,
      'category_id' => Category::all()->random()->id,
      'level_id' => Level::all()->random()->id,
       'name' => $name,
       'description'=> $faker->paragraph,
       'slug' => Str::slug($name, '-'),
       'picture' => Image::image(storage_path().'/app/public/courses', 600, 350, 'business', false),
       'status' => $status,
    ];
});
