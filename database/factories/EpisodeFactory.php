<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Episode;
use Faker\Generator as Faker;
use Faker\Provider\Image;

$factory->define(Episode::class, function (Faker $faker) {
	$title = $faker->sentence;
    return [
            'orderEpisode' => null,
            'title'=> $title,
			'description' => $faker->paragraph,
			'video' => $faker->randomElement(['<iframe width="560" height="315" src="https://www.youtube.com/embed/JOX5Vu5N-c0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' ,'<iframe width="560" height="315" src="https://www.youtube.com/embed/iI42u3bWHLQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>','<iframe width="560" height="315" src="https://www.youtube.com/embed/kH1JvwUWW7Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>']),
			'picture' => Image::image(storage_path().'/app/public/episodes', 1280, 720, 'abstract', false),
			'download' => $faker->url,
			'material' => $faker->url,
			'slug' => Str::slug($title ,'-'),
			'course_id' => null,
			'section_id' => null,
    ];
});
